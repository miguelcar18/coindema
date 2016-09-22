<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangePasswordRequest extends Request
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
            'password_actual'       => 'required|min:4', 
            'password'              => 'required|min:4',
            'password_confirmation' => 'required|min:4' 
        ];
    }

    public function messages()
    {
        return [
            'password_actual.required' => 'El campo contraseña actual es requerido',
            'password_actual.min' => 'El mínimo permitido son 4 caracteres',
            'password.required' => 'El campo nueva contraseña es requerido',
            'password.min' => 'El mínimo permitido son 4 caracteres',
            'password_confirmation.required' => 'El campo confirmar nueva contraseña es requerido',
            'password_confirmation.min' => 'El mínimo permitido son 4 caracteres',
        ];
    }

    public function response(array $errors)
    {
        if ($this->ajax()){
            return response()->json($errors, 200);
        }
        else
        {
        return redirect($this->redirect)
                ->withErrors($errors, 'formulario')
                ->withInput();
        }
    }

}
