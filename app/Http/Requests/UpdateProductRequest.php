<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'photos[]' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'photos[].required' => 'Foto produk harus diisi',
            'photos[].image' => 'Foto produk harus berupa gambar',
            'photos[].mimes' => 'Foto produk harus berupa gambar',
            'photos[].max' => 'Foto produk tidak boleh lebih dari 1 MB',
        ];
    }
}
