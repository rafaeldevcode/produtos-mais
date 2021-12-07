<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoMarca extends FormRequest
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
            'nome_marca' => 'required',
            'slug_marca' => 'required',
            'banner_1' => 'required',
            'banner_2' => 'required',
            'banner_3' => 'required',
            'image_desc' => 'required',
            'titulo_desc' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!'
        ];
    }
}
