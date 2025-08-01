<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
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
        return [
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'gudang_id' => 'required|exists:gudangs,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
        ];
    }
}
