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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'sometimes|required|string|max:255',
            'kategori_id' => 'sometimes|required|exists:kategoris,id',
            'gudang_id' => 'sometimes|required|exists:gudangs,id',
            'supplier_id' => 'sometimes|required|exists:suppliers,id',
            'deskripsi' => 'sometimes|nullable|string',
            'stok' => 'sometimes|required|integer|min:0',
        ];
    }
}
