<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'     => 'required|min:3|unique:categories,name,' .$this->route('category')->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'       => 'Este campo es requerido.',
            'name.unique'         => 'El nombre de la categoría ya existe.',
            'name.min'            => 'El nombre debe tener mínimo 3 carateres.',

        ];
    }
}
