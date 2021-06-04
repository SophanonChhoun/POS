<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class BannerController extends Controller
{
    public function index()
    {
        try {
            $data = Banner::with('media', 'category')->get();
            $categories = Category::where('is_enable', 1)->get();
            $data = BannerResource::collection($data);
            return view('admin.banner.banner', compact('data', 'categories'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $idS = array_column($request->data,"id");
            Banner::whereNotIn('id', $idS)->delete();
            foreach ($request->data as $banner)
            {
                if(isset($banner['image'])) {
                    $banner['media_id'] = MediaLib::generateImageBase64($banner['image']);
                }
                if(!$banner['is_category']) {
                    $banner['category_id'] = null;
                }
                Banner::updateOrCreate([
                   'id' => $banner['id'] ?? null
                ], $banner);
            }

            return $this->success('Success');
         }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
