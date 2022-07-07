<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer|min:1',
            'merk_id' => 'required|integer',
        ];
    }

    // message bahasa indonesia
    public function messages()
    {
        return [
            'name.required' => 'Nama produk harus diisi',
            'name.string' => 'Nama produk harus berupa string',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'description.required' => 'Deskripsi produk harus diisi',
            'price.required' => 'Harga produk harus diisi',
            'price.integer' => 'Harga produk harus berupa integer',
            'price.min' => 'Harga produk minimal 1',
            'merk_id.integer' => 'Merk produk harus berupa integer',
            'merk_id.required' => 'Merk produk harus diisi',
        ];
    }
}
