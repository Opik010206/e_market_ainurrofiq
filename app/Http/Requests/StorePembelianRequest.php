<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
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
                'kode_masuk' => 'required',
                'tanggal_masuk' => 'required',
                'total' => 'required',
                'pemasok_id' => 'required',
                'user_id' => 'required',
                'barang_id' => 'required',
                'harga_beli' => 'required',
                'jumlah' => 'required',
                'sub_total' => 'required',
        ];
    }
    public function messages(){
        return [
            'kode_masuk.required' => 'kode masuk belum diisi!',
            'tanggal_masuk.required' => 'tanggal masuk belum diisi!',
            'total.required' => 'total belum diisi!',
            'pemasok_id.required' => 'pemasok belum diisi!',
            'user_id.required' => 'user belum diisi!',
            'barang_id.required' => 'barang belum diisi!',
            'harga_beli.required' => 'harga beli belum diisi!',
            'jumlah.required' => 'jumlah belum diisi!',
            'sub_total.required' => 'sub total belum diisi!',
        ];
    }
}
