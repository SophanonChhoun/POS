<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionContentResource;
use App\Models\Promotion;
use App\Models\PromotionContent;
use Illuminate\Http\Request;
use Exception;
use DB;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Promotion::with("media");

            if(isset($request->search)) {

                $data = $data->where("name", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }

            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.promotion.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        return view("admin.promotion.create");
    }

    public function store(Request  $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->image)) {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            $promotion = Promotion::create($request->all());
            PromotionContent::store($request['contents'], $promotion->id);
            DB::commit();
            return $this->success('');
        }catch (Exception $exception) {
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $promotion = Promotion::with("media", 'content.media')->find($id);
            $promotion['contents'] = PromotionContentResource::collection($promotion['content']);
            return view("admin.promotion.edit", compact('promotion'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->image)) {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            Promotion::find($id)->update($request->all());
            PromotionContent::store($request['contents'], $id);
            DB::commit();
            return $this->success("");
        }catch (Exception $exception) {
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            Promotion::findOrFail($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            Promotion::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
