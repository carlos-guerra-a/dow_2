<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CuentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'user' => 'required|min:1|max:20',
            'password' => 'required|min:6|max:100',
            'nombre' => 'required|min:1|max:20',
            'apellido' => 'required|min:1|max:20',
        ];
    }



    public function messages()
    {
        return [
            'user.required' => 'El campo usuario es requerido.',
            'user.min' => 'El campo usuario debe tener al menos 1 carácter.',
            'user.max' => 'El campo usuario no puede tener más de 20 caracteres.',
            'password.required' => 'El campo contraseña es requerido.',
            'password.min' => 'El campo contraseña debe tener al menos 6 caracteres.',
            'password.max' => 'El campo contraseña no puede tener más de 100 caracteres.',
            'nombre.required' => 'El campo nombre es requerido.',
            'nombre.min' => 'El campo nombre debe tener al menos 1 carácter.',
            'nombre.max' => 'El campo nombre no puede tener más de 20 caracteres.',
            'apellido.required' => 'El campo apellido es requerido.',
            'apellido.min' => 'El campo apellido debe tener al menos 1 carácter.',
            'apellido.max' => 'El campo apellido no puede tener más de 20 caracteres.',
        ];
    }

}
