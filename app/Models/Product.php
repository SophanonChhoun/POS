<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'brand',
        'country',
        'quantity',
        'item_class',
        'sequence_order',
        'video_url',
        'subcategory_id',
        'is_enable',
        'media_id',
        'price',
    ];

    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }

    public function medias()
    {
        return $this->belongsToMany(MediaFile::class, ProductMediaMap::class, 'product_id', 'media_id');
    }

    public function subcategory()
    {
        return $this->hasOne(SubCategory::class,"id","subcategory_id");
    }

    public static function updateQuantity($products)
    {
        foreach ($products as $key => $product)
        {
            $buy = ProductImport::where('product_id', $product['product_id'])->get();
            $totalBuy = $buy->pluck('quantity')->sum();
            $sell = ProductSell::where('product_id', $product['product_id'])->get();
            $totalSell = $sell->pluck('quantity')->sum();
            if( $totalBuy < $totalSell) {
                return false;
            }
            $total = $totalBuy - $totalSell;
            Product::find($product['product_id'])->update([
                'quantity' => $total
            ]);
        }

        return true;
    }

    public static function quantity($productIds)
    {
        foreach ($productIds as $key => $productId)
        {
            $buy = ProductImport::where('product_id', $productId)->get();
            $totalBuy = $buy->pluck('quantity')->sum();
            $sell = ProductSell::where('product_id', $productId)->get();
            $totalSell = $sell->pluck('quantity')->sum();
            if( $totalBuy < $totalSell) {
                return false;
            }
            $total = $totalBuy - $totalSell;
            Product::find($productId)->update([
                'quantity' => $total
            ]);
        }

        return true;
    }
}
