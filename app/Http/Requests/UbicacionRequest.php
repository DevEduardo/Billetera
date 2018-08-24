<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UbicacionRequest extends Request
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
          'ubicacion'=>'required|max:50|min:5|string',
          'municipio'=>'required',
        ];
    }
}
