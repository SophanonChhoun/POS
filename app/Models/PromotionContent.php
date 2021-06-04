<?php

namespace App\Models;

use App\Core\MediaLib;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'media_id',
        'promotion_id'
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }

    public static function store($medias, $id)
    {
        self::where('promotion_id', $id)->delete();
        foreach ($medias as $key => $media) {
            if(isset($media['image']))
            {
                $media['media_id'] = MediaLib::generateImageBase64($media['image']);
            }
            self::create([
                'promotion_id' => $id,
                'media_id' => $media['media_id'] ?? null,
                'content' => $media['content'] ?? null,
            ]);
        }
    }
}
