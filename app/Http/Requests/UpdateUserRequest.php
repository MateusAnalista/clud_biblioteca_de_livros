<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use \Auth;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc',
            'password' => 'nullable|required_with:password_confirmation|string|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Este campo é obrigatório',
            'name.required' => 'Este campo é obrigatório',
            'name.min' => 'Minimo 3 Caracteres',
            'name.max' => 'Maximo 255 Caracteres',
            'email.required' => 'Este campo é obrigatório',
            'email.email' => 'O email não é valido',
            'password.confirmed' => 'Os Campos de Senhas estão diferentes',
            'password.min' => 'Minimo 3 Caracteres',
            'password.max' => 'Maximo 255 Caracteres'
        ];
    }

}
