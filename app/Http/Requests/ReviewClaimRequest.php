<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class ReviewClaimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'decision'   => ['required', Rule::in(['approve', 'reject'])],
            'admin_note' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'decision.required' => 'Pilih setujui atau tolak.',
            'decision.in'       => 'Keputusan tidak valid.',
            'admin_note.max'    => 'Catatan maksimal 500 karakter.',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $claim = $this->route('claim');

            if ($claim->status !== 'pending') {
                $validator->errors()->add('decision', 'Klaim ini sudah diproses.');
            } elseif ($this->input('decision') === 'approve'
                && in_array($claim->item->status, ['claimed', 'resolved'])) {
                $validator->errors()->add('decision', 'Barang ini sudah diklaim atau dikembalikan.');
            }
        });
    }
}