<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "sequence_order",
        "is_enable",
        "background_color",
        "display_discount",
        "media_id"
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
}
