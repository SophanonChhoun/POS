<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSell extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public static function store($products, $id)
    {
        self::where('sale_id', $id)->delete();
        foreach ($products as $key => $product) {
            self::create([
                'sale_id' => $id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }
    }
}
