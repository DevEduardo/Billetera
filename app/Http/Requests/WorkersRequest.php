<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WorkersRequest extends Request
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

          'cedula'=>'required|numeric|unique:workers|min:8',
          'nombres'=>'required|string|min:5',
          'apellidos'=>'required|string|min:5',
          'correo'=>'required|unique:workers',
          'sexo'=>'required',
          'nacionalidad'=>'required',
          'ciudad'=>'required',
          'estado'=>'required',
          'fecha_nac'=>'required',
          'telf_movil'=>'required',
          'telf_local'=>'required',
          'estado_civil'=>'required',
          'dir_domicilio'=>'required'
        ];
    }
}
