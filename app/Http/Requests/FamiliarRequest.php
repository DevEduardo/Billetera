<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FamiliarRequest extends Request
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
          'cedula'=>'numeric|unique:familiares|min:8',
          'nombres'=>'required|string|min:5',
          'apellidos'=>'required|string|min:5',
          'parentesco'=> 'required',
          'fecha_nac'=> 'required'
        ];
    }
}
