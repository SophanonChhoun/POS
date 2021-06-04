<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        try {
            $data = Slider::with('media', 'category')->get();
            $categories = Category::where('is_enable', 1)->get();
            $data = SliderResource::collection($data);
            return view('admin.slider.slider', compact('data', 'categories'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $idS = array_column($request->data,"id");
            Slider::whereNotIn('id', $idS)->delete();
            foreach ($request->data as $slider)
            {
                if(isset($slider['image'])) {
                    $slider['media_id'] = MediaLib::generateImageBase64($slider['image']);
                }
                if(!$slider['is_category']) {
                    $slider['category_id'] = null;
                }
                if($slider['is_category'] || $slider['news_promotion']) {
                    $slider['url'] = '';
                }
                Slider::updateOrCreate([
                    'id' => $slider['id'] ?? null
                ], $slider);
            }

            return $this->success('Success');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
