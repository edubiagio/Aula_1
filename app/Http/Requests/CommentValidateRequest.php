<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentValidateRequest extends FormRequest
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
            'message' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'message.required'=>'O campo mensagem é obrigatório.',
            'message.string'=>'O campo mensagem deve ser um texto válido.',
            'message.max'=>'O campo mensagem deve ter no máximo 255 caracteres.',
        ];
    }
}
