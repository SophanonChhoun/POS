<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealerResource;
use App\Models\Currency;
use App\Models\Dealer;
use App\Models\Import;
use App\Models\Product;
use App\Models\ProductImport;
use App\Models\ProductSell;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use DB;

class ImportController extends Controller
{

    public function index(Request $request)
    {
        try {
            $imports = Import::with("dealer");
            if(isset($request['max']))
            {
                $imports = $imports->where('total', '<=', number_format($request['max']));
            }
            if(isset($request['min']))
            {
                $imports = $imports->where('total', '>=', number_format($request['min']));
            }
            $data = $imports->orderByDesc('id')->simplePaginate(10);

            return view('admin.import.list', compact('data'));

        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $dealers = DealerResource::collection(Dealer::where('is_enable', true)->get());
            $products = Product::where('is_enable', true)->get();
            $currency = Currency::get()->first();
            return view('admin.import.create', compact( 'dealers', 'products', 'currency'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $import = Import::create($request->all());
            ProductImport::store($request['products'], $import->id);
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
            $import = Import::with('products')->find($id);
            $dealers = DealerResource::collection(Dealer::where('is_enable', true)->get());
            $products = Product::where('is_enable', true)->get();

            return view('admin.import.edit', compact('import', 'products', 'dealers'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            Import::find($id)->update($request->all());
            ProductImport::store($request['products'], $id);
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

    public function updatePaid($id)
    {
        try {
            Import::find($id)->update([
                'paid_at' => date('Y-m-d'),
                'paid' => true
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
    public function updateArrived($id,Request $request)
    {
        try {
            Import::find($id)->update([
                'arrived_at' => date('Y-m-d'),
                'arrived' => true
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Import::find($id)->delete();
            $productImport = ProductImport::where('import_id', $id)->get();
            $productImportID = $productImport->pluck('product_id');
            ProductImport::where('import_id', $id)->delete();
            $productQuantity = Product::quantity($productImportID);
            if(!$productQuantity)
            {
                return $this->fail('There is error with update product quantity');
            }
            DB::commit();
            return back();
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }
}
