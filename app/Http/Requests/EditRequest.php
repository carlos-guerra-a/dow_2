<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{public function rules()
    {
        return [
            'nombre' => 'required|min:1|max:20',
            'apellido' => 'required|min:1|max:20',
        ];
    }



    public function messages()
    {
        return [
            
            'nombre.required' => 'El campo nombre es requerido.',
            'nombre.min' => 'El campo nombre debe tener al menos 1 carácter.',
            'nombre.max' => 'El campo nombre no puede tener más de 20 caracteres.',
            'apellido.required' => 'El campo apellido es requerido.',
            'apellido.min' => 'El campo apellido debe tener al menos 1 carácter.',
            'apellido.max' => 'El campo apellido no puede tener más de 20 caracteres.',
        ];
    }

}
