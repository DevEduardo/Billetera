<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:50|min:5|string',
            'username'=>'required|max:50|min:5|AlphaNum',
            'email'=>'required|Email|Unique:users',
            'password'  =>'Required|AlphaNum|Between:4,8|Confirmed',
            'password_confirmation'=>'Required|AlphaNum|Between:4,8'
        ];
    }
}
