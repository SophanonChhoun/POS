<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
        'address',
        'first_name',
        'last_name',
        'is_enable',
        'media_id',
    ];

    public function getNameAttribute()
    {
        if (isset($this->first_name) || isset($this->last_name)) {
            return $this->first_name. ' '. $this->last_name;
        }

        return null;

    }

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
}
