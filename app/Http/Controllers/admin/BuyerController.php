<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;
use DB;
use Exception;

class BuyerController extends Controller
{
    public function index(Request $request)
    {
        $buyers = Buyer::with("media");

        if(isset($request->search))
        {
            $buyers = $buyers->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $buyers = $buyers->where("is_enable",$request->is_enable);
        }

        $data = $buyers->orderByDesc("id")->simplePaginate(10);
        return view("admin.buyer.list",compact("data"));
    }


    public function create()
    {
        return view("admin.buyer.create");
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $buyer = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $buyer['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            Buyer::create($buyer);
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
            $buyer = Buyer::with("media")->find($id);

            return view("admin.buyer.edit",compact("buyer"));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {

            $buyer = Buyer::find($id);
            if(!$buyer)
            {
                return $this->fail("Cannot find this buyer");
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
            $buyer = $buyer->update($data);

            if(!$buyer)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($buyer);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            Buyer::find($id)->update([
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
            Buyer::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }

}
