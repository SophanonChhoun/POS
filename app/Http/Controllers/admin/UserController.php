<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with("media");

        if(isset($request->search))
        {
            $users = $users->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $users = $users->where("is_enable",$request->is_enable);
        }

        $data = $users->orderByDesc("id")->simplePaginate(10);

        return view("admin.user.list",compact("data"));
    }

    public function create()
    {
        return view("admin.user.create");
    }

    public function store(Request $request)
    {
        $user = User::where("email",$request->email)->first();
        if ($user)
        {
            return $this->fail("Please input another email",403);
        }

        DB::beginTransaction();
        try {
            $user = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => $request->password,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $user['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = User::create($user);

            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception,500);
        }
    }

    public function show($id)
    {
        try {
            $user = User::with("media")->find($id);

            return view("admin.user.edit",compact("user"));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, UserProfileRequest $request)
    {
        DB::beginTransaction();
        try {

            $user = User::find($id);
            if(!$user)
            {
                return $this->fail("Cannot find this user");
            }
            $data = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $user = $user->update($data);

            if(!$user)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($user);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            User::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }

    public function showProfile()
    {
        $data = User::with("media")->find(auth()->user()->id);
        return view('admin.profile.information',compact('data'));
    }

    public function updateProfile(UserProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find(auth()->user()->id);
            if(!$user)
            {
                return $this->fail("Cannot find this user");
            }
            $data = [
                "name" => $request->name,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
            ];
            $user = $user->update($data);

            if(!$user)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($user);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function changePassword()
    {
        try {
            $data = User::with("media")->find(auth()->user()->id);
            return view("admin.profile.password",compact("data"));
        }catch (Exception $exception){
            return redirect('admin/profile/show');
        }
    }

    public function updatePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = auth()->user()->id;
            if (!(Hash::check($request->old_password, Auth::user()->getAuthPassword())))
            {
                return $this->fail("Wrong old password. Please input a correct one.");
            }
            $request['password'] = $request['new_password'];

            $user=User::find($id)->update([
                "password" => $request['new_password']
            ]);
            $user = User::find($id);
            if (auth()->attempt([
                "email" => $user->email,
                "password" => $request['new_password'],
                "is_enable" => true
            ])){
                DB::commit();
                return $this->success("Success");
            }else{
                DB::rollback();
                return $this->fail("Something went wrong");
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail("Something went wrong");
        }
    }

    public function changeAvatar()
    {
        try {
            $data = User::with("media")->find(auth()->user()->id);
            return view("admin.profile.avatar",compact("data"));
        }catch (Exception $exception){
            return redirect('admin/profile/show');
        }
    }

    public function updateAvatar(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->image)
            {
                $media_id = MediaLib::generateImageBase64($request['image']);
                User::find(auth()->user()->id)->update([
                    "media_id" => $media_id
                ]);
            }
            DB::commit();
            return $this->success("Success");
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail("Something went wrong");
        }
    }
}
