<?php

namespace App\Http\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // any logged-in user may report; auth is handled by middleware
    }

    public function rules(): array
    {
        return [
            'type'        => ['required', Rule::in(Item::TYPES)],
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'category'    => ['required', Rule::in(Item::CATEGORIES)],
            'location'    => ['required', 'string', 'max:255'],
            'date'        => ['required', 'date', 'before_or_equal:today'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'required'        => ':attribute wajib diisi.',
            'in'              => ':attribute tidak valid.',
            'image'           => 'File harus berupa gambar.',
            'mimes'           => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max'       => 'Ukuran gambar maksimal 2 MB.',
            'date.before_or_equal' => 'Tanggal tidak boleh di masa depan.',
        ];
    }

    public function attributes(): array
    {
        return [
            'type'        => 'Jenis laporan',
            'title'       => 'Nama barang',
            'description' => 'Deskripsi',
            'category'    => 'Kategori',
            'location'    => 'Lokasi',
            'date'        => 'Tanggal',
            'image'       => 'Foto',
        ];
    }
}