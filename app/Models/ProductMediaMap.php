<?php

namespace App\Models;

use App\Core\MediaLib;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMediaMap extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'media_id'
    ];


    public function media()
    {
        return $this->belongsTo(MediaFile::class,"media_id","media_id");
    }

    public static function store($medias, $id)
    {
        self::where('product_id', $id)->delete();
        foreach ($medias as $key => $media) {
            if(isset($media['image']))
            {
                $media['media_id'] = MediaLib::generateImageBase64($media['image']);
            }
            self::create([
                'product_id' => $id,
                'media_id' => $media['media_id'],
            ]);
        }
    }
}
