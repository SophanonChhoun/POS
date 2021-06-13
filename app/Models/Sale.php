<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_id',
        'total',
        'delivered',
        'paid',
        'delivered_at',
        'paid_at',
        'promotion_id',
        'totalNotDiscount',
        'currency'
    ];

    public function buyer()
    {
        return $this->hasOne(Buyer::class,"id","buyer_id");
    }

    public function products()
    {
        return $this->hasMany(ProductSell::class, 'sale_id', 'id');
    }
}
