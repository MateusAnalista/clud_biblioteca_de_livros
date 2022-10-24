<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use \Auth;

class StoreLivrosRequest extends FormRequest
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
            'titulo' => 'required|min:3|max:255',
            'role' => 'required',
            'editora' => 'required|min:3|max:255',
            'genero_id' => 'required|exists:generos,id',
            'descricao' => 'required|min:3',
            'imagem' => 'required|mimes:png,jpg,jpeg,gif|max:10000',
            'pdf' => 'required|mimes:pdf|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Este campo é obrigatório',
            'titulo.min' => 'Minimo 3 caracteres',
            'titulo.max' => 'Maximo 255 caracteres',
            'role.required'  => 'Este campo é obrigatório',
            'editora.required' => 'Este campo é obrigatório',
            'editora.min' => 'Minimo 3 caracteres',
            'editora.max' => 'Minimo 255 caracteres',
            'descricao.required' => 'Este campo é obrigatório',
            'descricao.min' => 'Minimo 3 caracteres',
            'imagem.required' => 'Este campo é obrigatório',
            'imagem.mimes' => 'Envie imagens dos tipos : png,jpg,jpeg,gif',
            'imagem.max' => 'O tamanho maximo deve ser de 10MB',
            'pdf.required' => 'Este campo é obrigatório',
            'pdf.mimes' => 'Envie um arquivo tipo pdf',
            'pdf.max' => 'O tamanho deve ser de no maximo 2048MB'
        ];
    }

    public function prepareForValidation()
    {
        $data['user_id'] = Auth::user()->id;
        $this->merge($data);
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = $validator->errors();
    //     return redirect()->back()->with('message', 'IT NOT WORKS!');
    // }
}
