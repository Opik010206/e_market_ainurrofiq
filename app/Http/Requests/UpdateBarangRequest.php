<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode_barang' => ['required', 'numeric'],
            'nama_barang' => ['required', 'max:50', 'string'],
            'satuan' => ['required', 'max:10', 'string'],
            'harga_jual' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            // 'ditarik' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
            'produk_id' => ['required', 'exists:produk,id'],
        ];
    }

    public function messages()
    {
        return[
            'kode_barang.required' => 'Data kode produk harus diisi!',
            'nama_barang.required' => 'Data nama produk harus diisi!',
            'satuan.required' => 'Data satuan harus diisi!',
            'haraga_jual.required' => 'Data harga jual harus diisi!',
            'stok.required' => 'Data stok harus diisi!',
            'user_id.required' => 'Data user harus diisi!',
            'produk_id.required' => 'Data categori produk harus diisi!'
        ];
    }
}
