<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $data = Template::with('media');
        if(isset($request->is_enable))
        {
            $data = $data->where('is_enable', $request->is_enable);
        }
        $data = $data->orderByDesc('id')->simplePaginate(10);

        return view('admin.template.list', compact('data'));
    }

    public function create()
    {
        return view("admin.template.create");
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $template = [
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $template['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = Template::create($template);

            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage(),500);
        }
    }

    public function show($id)
    {
        try {
            $template = Template::with("media")->find($id);

            return view("admin.user.edit",compact("template"));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $template = Template::find($id);
            if(!$template)
            {
                return $this->fail("Cannot find this template");
            }
            $data = [
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $template = $template->update($data);

            if(!$template)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($template);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            Template::find($id)->update([
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
            Template::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }
}
