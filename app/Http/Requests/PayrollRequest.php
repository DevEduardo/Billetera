<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PayrollRequest extends Request
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
            'Certificado_niño_sano'=> 'required',
            'habilidades'=> 'required|string|min:5',
            'gustos'=> 'required|string|min:5',
            'vacunas'=> 'required|string|min:5',
            'alergia'=> 'required|string|min:5',
            'foto'=> 'required',
            'tratamiento_actual'=> 'required|string|min:5',
            'alimentos_prohibidos'=> 'required|string|min:5',
            'medicamentos_prohibidos'=> 'required|string|min:5',
            'cedula_contacto'=> 'required',
            'nombres'=> 'required|string|min:5',
            'apellidos'=> 'required|string|min:5',
            'telefono'=> 'required',
            'observaciones'=> 'string|min:5',
        ];
    }
}
