<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoriaDonacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // permitir la request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('categoriaDonacion')->id_categoria_donacion;

        return [
            'nombre_categoria' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categoria_donacion', 'nombre_categoria')->ignore($id, 'id_categoria_donacion')
            ],
        ];
    }
}