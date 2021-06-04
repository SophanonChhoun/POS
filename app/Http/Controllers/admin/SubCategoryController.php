<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Exception;

class SubCategoryController extends Controller
{

    public function index(Request $request)
    {
        try {
            $data = SubCategory::with("category");

            if(isset($request->search)) {

                $data = $data->where("description", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }

            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.subcategory.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        $categories = Category::where("is_enable", true)->get();
        return view("admin.subcategory.create", compact('categories'));
    }

    public function store(Request  $request)
    {
        try {

            SubCategory::create($request->all());

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {

            $subcategory = SubCategory::with("category")->find($id);
            $categories = Category::where("is_enable", 1)->get();
            return view("admin.subcategory.edit", compact('categories', 'subcategory'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {

            SubCategory::find($id)->update($request->all());
            return $this->success("");
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            SubCategory::findOrFail($id)->update([
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
            SubCategory::findOrFail($id)->update([
                "sequence_order" => $request->sequence_order
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            SubCategory::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
