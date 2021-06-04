<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'news_promotion',
        'media_id',
        'url'
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }

    public function category()
    {
        return $this->hasOne(Category::class,"id","category_id");
    }
}
