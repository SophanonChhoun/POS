<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "is_enable",
        "phone_number",
        "latitude",
        "longitude",
        "media_id",
        "address",
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
}
