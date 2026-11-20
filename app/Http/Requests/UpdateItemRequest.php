<?php

namespace App\Http\Requests;

class UpdateItemRequest extends StoreItemRequest
{
    public function authorize(): bool
    {
        return $this->route('item')->isManageableBy($this->user());
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'remove_image' => ['nullable', 'boolean'],
        ]);
    }
}