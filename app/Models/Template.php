<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
      'media_id',
      'is_enable',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
}
