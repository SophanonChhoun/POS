<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'is_category' => $this->category_id ? true : false,
          'category_id' => $this->category_id,
          'news_promotion' => $this->news_promotion,
          'media' => $this->media,
        ];
    }
}
