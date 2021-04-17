<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\DefaultFormRequest;


class UserProfileRequest extends DefaultFormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'unique:users', 'max:255'],
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }
}
