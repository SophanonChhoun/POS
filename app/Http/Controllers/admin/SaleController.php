<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BuyerResource;
use App\Models\Buyer;
use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductSell;
use App\Models\Promotion;
use App\Models\Sale;
use Illuminate\Http\Request;
use Exception;
use DB;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $imports = Sale::with("buyer");
            if(isset($request['max']))
            {
                $imports = $imports->where('total', '<=', number_format($request['max']));
            }
            if(isset($request['min']))
            {
                $imports = $imports->where('total', '>=', number_format($request['min']));
            }
            $data = $imports->orderByDesc('id')->simplePaginate(10);

            return view('admin.sale.list', compact('data'));

        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $buyers = BuyerResource::collection(Buyer::where('is_enable', true)->get());
            $products = Product::where('is_enable', true)->get();
            $promotions = Promotion::where('is_enable', true)->get();
            $currency = Currency::get()->first();

            return view('admin.sale.create', compact( 'buyers', 'products', 'promotions', 'currency'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $sale = Sale::create($request->all());
            ProductSell::store($request['products'], $sale->id);
            $updateQuantity = Product::updateQuantity($request['products']);
            if(!$updateQuantity)
            {
                return $this->fail('There is something wrong with import and sale');
            }
            DB::commit();
            return $this->success('');
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $sale = Sale::with('products.product')->find($id);
            $buyers = BuyerResource::collection(Buyer::where('is_enable', true)->get());
            $products = Product::where('is_enable', true)->get();
            $promotions = Promotion::where('is_enable', true)->get();

            return view('admin.sale.edit', compact('sale', 'products', 'buyers', 'promotions'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            Sale::find($id)->update($request->all());
            ProductSell::store($request['products'], $id);
            $updateQuantity = Product::updateQuantity($request['products']);
            if(!$updateQuantity)
            {
                return $this->fail('There is something wrong with import and sale');
            }
            DB::commit();
            return $this->success('');
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            Sale::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
    public function updatePaid($id)
    {
        try {
            Sale::find($id)->update([
                'paid_at' => date('Y-m-d'),
                'paid' => true
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
    public function updateDelivered($id)
    {
        try {
            Sale::find($id)->update([
                'delivered_at' => date('Y-m-d'),
                'delivered' => true
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
