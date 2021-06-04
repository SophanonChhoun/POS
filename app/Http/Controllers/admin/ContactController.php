<?php

namespace App\Http\Controllers\admin;

use App\Core\MediaLib;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Exception;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Contact::with("media");

            if(isset($request->search)) {

                $data = $data->where("name", "LIKE", $request->search."%");
            }
            if(isset($request->is_enable)) {
                $data = $data->where("is_enable", $request->is_enable);
            }
            $data = $data->orderByDesc("id")->simplePaginate(10);
            return view("admin.contact.list", compact("data"));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        try {
            if(isset($request->image)) {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            Contact::create($request->all());

            return $this->success('');
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $contact = Contact::with("media")->find($id);

            return view("admin.contact.edit", compact('contact'));
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            if(isset($request->image)) {
                $request['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            Contact::find($id)->update($request->all());
            return $this->success("");
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Contact::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            Contact::findOrFail($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
