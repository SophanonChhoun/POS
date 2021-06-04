<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $fillable = [
      'dealer_id',
      'total',
      'arrived',
      'paid',
      'arrived_at',
      'paid_at',
      'is_enable',
      'currency'
    ];

    public function dealer()
    {
        return $this->hasOne(Dealer::class,"id","dealer_id");
    }

    public function products()
    {
        return $this->hasMany(ProductImport::class, 'import_id', 'id');
    }

}
