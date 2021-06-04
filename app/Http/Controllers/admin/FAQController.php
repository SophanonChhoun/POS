<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = FAQ::latest();

            if(isset($request->search)) {

                $data = $data->where("name", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }

            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.FAQ.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        return view("admin.FAQ.create");
    }

    public function store(Request  $request)
    {
        try {
            FAQ::create($request->all());

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $faq = FAQ::find($id);
            return view("admin.FAQ.edit", compact('faq'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            FAQ::find($id)->update($request->all());
            return $this->success("");
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            FAQ::findOrFail($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateOrder($id, Request $request)
    {
        try {
            FAQ::findOrFail($id)->update([
                "order" => $request->order
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            FAQ::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
