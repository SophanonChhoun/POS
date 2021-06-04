<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQQuestion;
use Illuminate\Http\Request;
use Exception;

class FAQQuestionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = FAQQuestion::latest();

            if(isset($request->search)) {

                $data = $data->where("name", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }

            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.FAQQuestion.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        $faqs = FAQ::where('is_enable', true)->get();
        return view("admin.FAQQuestion.create", compact('faqs'));
    }

    public function store(Request  $request)
    {
        try {
            FAQQuestion::create($request->all());

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $FAQQuestion = FAQQuestion::find($id);
            $faqs = FAQ::where('is_enable', true)->get();
            return view("admin.FAQQuestion.edit", compact('FAQQuestion', 'faqs'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            FAQQuestion::find($id)->update($request->all());
            return $this->success("");
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            FAQQuestion::findOrFail($id)->update([
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
            FAQQuestion::findOrFail($id)->update([
                "order" => $request->order
            ]);

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            FAQQuestion::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
