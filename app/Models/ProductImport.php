<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImport extends Model
{
    use HasFactory;

    protected $fillable = [
        'import_id',
        'product_id',
        'quantity',
        'price'
    ];

    public static function store($products, $id)
    {
        self::where('import_id', $id)->delete();
        foreach ($products as $key => $product) {
            self::create([
                'import_id' => $id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }
    }
}
