<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'titulo' => 'required|min:1|max:20',
            'archivo' => 'required',
        ];
    }



    public function messages()
    {
        return [
            
            'titulo.required' => 'El campo título es requerido.',
            'titulo.min' => 'El campo título debe tener al menos 1 carácter.',
            'titulo.max' => 'El campo título no puede tener más de 20 caracteres.',
            'archivo.required' => 'El archivo es requerido.',
            
        ];
    }
}
