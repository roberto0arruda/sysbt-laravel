<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductsStoreRequest extends FormRequest
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
            'title'  => 'required|unique:products',
            'price'  => 'required|numeric',
            'photo1' => 'nullable|mimes:png,jpg,jpeg',
            'photo2' => 'nullable|mimes:png,jpg,jpeg',
            'photo3' => 'nullable|mimes:png,jpg,jpeg',
        ];
    }
}
