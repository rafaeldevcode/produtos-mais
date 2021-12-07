<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoProduto extends FormRequest
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
            'nome_produto' => 'required',
            'id' => 'required',
            'link_compra' => 'required',
            'quant_produto' => 'required',
            'image_produto' => 'required',
            'valor_unit' => 'required',
            'valor_cheio' => 'required',
            'valor_parcelado' => 'required',
            'parcelas' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!'
        ];
    }
}
