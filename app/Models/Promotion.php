<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'media_id',
        'is_enable',
        'discount',
        'cost',
        'discount_percentage',
        'code'
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }

    public function content()
    {
        return $this->hasMany(PromotionContent::class, 'promotion_id', 'id');
    }
}
