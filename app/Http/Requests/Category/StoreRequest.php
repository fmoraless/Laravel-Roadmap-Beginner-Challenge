<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|unique:categories|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required'       => 'Este campo es requerido.',
            'name.string'         => 'El valor no es correcto.',
            'name.unique'         => 'El nombre de la categoría ya existe.',
            'name.min'            => 'El nombre debe tener mínimo 3 carateres.',

        ];
    }
}
