<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Dealer;
use App\Models\Import;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $buyers = Buyer::all()->count();
        $dealers = Dealer::all()->count();
        $products = Product::all()->count();
        $promotions = Promotion::all()->count();
        $categories = Category::all()->count();
        $productImport = Import::all();
        $productImport = $productImport->pluck('total')->sum();
        $productSale = Sale::all();
        $productSale = $productSale->pluck('total')->sum();
        $total = $productImport - $productSale;
        return view('admin.dashboard.dashboard',
            compact('users', 'buyers', 'dealers', 'productSale', 'total', 'categories','products', 'promotions', 'productImport'));
    }
}
