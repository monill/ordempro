<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
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
            'code'       => 'required|string|max:10|unique:languages,code',
            'name'       => 'required|string|max:50',
            'direction'  => 'required|in:ltr,rtl',
            'icon'       => 'nullable|string|max:20',
            'is_enabled' => 'boolean',
        ];
    }
}
