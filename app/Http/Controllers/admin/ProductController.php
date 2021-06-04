<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductMediaMap;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Product::with("subcategory", "media");
            if(isset($request->search)) {

                $data = $data->where("name", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }

            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.product.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        $subcategories = SubCategory::where("is_enable", true)->get();
        return view("admin.product.create", compact('subcategories'));
    }

    public function store(Request  $request)
    {
        try {
            if(isset($request->image))
            {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = Product::create($request->all());
            if(filled($request->medias)) {
                ProductMediaMap::store($request->medias, $data->id);
            }
            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $product = Product::with('media', 'subcategory', 'medias')->find($id);
            $subcategories = SubCategory::where("is_enable", true)->get();
            return view("admin.product.edit", compact('product', 'subcategories'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            if(isset($request->image))
            {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            Product::find($id)->update($request->all());
            if(filled($request->medias)) {
                ProductMediaMap::store($request->medias, $id);
            }
            return $this->success("");
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            Product::findOrFail($id)->update([
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
            Product::findOrFail($id)->update([
                "sequence_order" => $request->sequence_order
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updatePrice($id, Request $request)
    {
        try {
            Product::findOrFail($id)->update([
                "price" => $request->price
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateQuantity($id, Request $request)
    {
        try {
            Product::findOrFail($id)->update([
                "quantity" => $request->quantity
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            Product::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
