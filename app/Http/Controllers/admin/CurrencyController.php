<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Exception;

class CurrencyController extends Controller
{
    public function index()
    {
        try {
            $data = Currency::all();
            return view('admin.currency.list', compact('data'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updatePrice($id,Request $request)
    {
        try {
            Currency::find($id)->update($request->all());
            return $this->success('Success');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
