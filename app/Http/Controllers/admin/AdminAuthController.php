<?php

namespace App\Http\Controllers\admin;

use App\Core\DateLib;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLoginAccess;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminAuthController extends Controller
{
    public function signin()
    {
        if(Session::get('auth'))
        {
            return \redirect('/admin/dashboard');
        }else{
            return view('login');
        }
    }

    public function getLoginAccess(Request $request,$credential_id)
    {
        DB::beginTransaction();
        try {
            $token = Password::getRepository()->createNewToken();
            $now = DateLib::getNow();
            $auth = UserLoginAccess::create([
                'user_id' => $credential_id,
                'access_token' => $token,
                'expired_at' => $now->addMinute(config('authentication.token_expiration_minute')),
                'revoked' => false,
            ]);
            $auth['expired_at'] = $now->timestamp;
            DB::commit();
            $user = User::where('id', $credential_id)->first();
            $result = [
                'access_token' => $auth['access_token'],
                'expired_at' => $auth['expired_at'],
                'user' => $user
            ];
            return $result;
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function login(Request $request)
    {
        DB::beginTransaction();
        try {
            if(auth()->attempt([
                'email' => $request['email'],
                'password' => $request['password'],
                'is_enable' => true,
            ])){
                $credential = auth()->user();
                $auth = self::getLoginAccess(
                    $request,
                    $credential->id
                );
                Session::put('auth', $auth);
                DB::commit();
                return $this->success('');
            }else{
                return $this->fail('Wrong email/password');
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function logout()
    {
        Session::forget("auth");
        return redirect("");
    }
}
