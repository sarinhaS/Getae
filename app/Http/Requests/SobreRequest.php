<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SobreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (!$this->isMethod('GET')) {
            return [
                'titulo' => 'required|min:3|max:255',
                'descricao' => 'required',
                'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ];
        }

        return [];
    }
}
