<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'kode_pelanggan' => ['required', 'numeric'],
            'nama_pelanggan' => ['required', 'max:50', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
            'no_telp' => ['required', 'numeric'],
            'email' => ['required', 'max:255', 'string'],
        ];
    }

    public function messages()
    {
        return[
            'nama_pelanggan.required' => 'Data nama pelanggan belum di isi!',
            'nama_pelanggan.required' => 'Data nama pelanggan belum di isi!',
            'nama_pelanggan.required' => 'Data nama pelanggan belum di isi!',
            'nama_pelanggan.required' => 'Data nama pelanggan belum di isi!'
        ];
    }
}
