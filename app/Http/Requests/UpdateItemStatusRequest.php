<?php

namespace App\Http\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateItemStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'status' => [
                'required',
                Rule::in(array_keys(Item::STATUS_LABELS)),
                Rule::notIn([$this->route('item')->status]),
            ],
            'note' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status wajib dipilih.',
            'status.in'       => 'Status tidak valid.',
            'status.not_in'   => 'Status sudah sama dengan status saat ini.',
            'note.max'        => 'Catatan maksimal 500 karakter.',
        ];
    }
}