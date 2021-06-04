<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Dealer;
use Illuminate\Http\Request;
use DB;
use Exception;

class DealerController extends Controller
{
    public function index(Request $request)
    {
        $dealers = Dealer::with("media");

        if(isset($request->search))
        {
            $dealers = $dealers->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $dealers = $dealers->where("is_enable",$request->is_enable);
        }

        $data = $dealers->orderByDesc("id")->simplePaginate(10);

        return view("admin.dealer.list",compact("data"));
    }

    public function create()
    {
        return view("admin.dealer.create");
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $Dealer = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $Dealer['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            Dealer::create($Dealer);
            DB::commit();
            return $this->success('');
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception,500);
        }
    }

    public function show($id)
    {
        try {
            $dealer = Dealer::with("media")->find($id);

            return view("admin.dealer.edit",compact("dealer"));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {

            $dealer = Dealer::find($id);
            if(!$dealer)
            {
                return $this->fail("Cannot find this Dealer");
            }
            $data = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "phone_number" => $request->phone_number,
                "address" => $request->address,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $dealer = $dealer->update($data);

            if(!$dealer)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($dealer);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            Dealer::find($id)->update([
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
            Dealer::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }

}
