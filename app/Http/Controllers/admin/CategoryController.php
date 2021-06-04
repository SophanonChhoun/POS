<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Category::with("media");

            if(isset($request->search)) {

                $data = $data->where("name", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }

            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.category.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(Request  $request)
    {
        try {
            if(isset($request->image)) {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            Category::create($request->all());

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $category = Category::with("media")->find($id);

            return view("admin.category.edit", compact('category'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            if(isset($request->image)) {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            Category::find($id)->update($request->all());
            return $this->success("");
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            Category::findOrFail($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateOrder($id, Request $request)
    {
        try {
            Category::findOrFail($id)->update([
                "sequence_order" => $request->sequence_order
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            Category::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
