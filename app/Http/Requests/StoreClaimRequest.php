<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreClaimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'proof' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'proof.required' => 'Bukti kepemilikan wajib diisi.',
            'proof.min'      => 'Bukti kepemilikan minimal 10 karakter.',
            'proof.max'      => 'Bukti kepemilikan maksimal 1000 karakter.',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if (! $this->route('item')->canBeClaimedBy($this->user())) {
                $validator->errors()->add('proof', 'Barang ini tidak dapat kamu klaim saat ini.');
            }
        });
    }
}