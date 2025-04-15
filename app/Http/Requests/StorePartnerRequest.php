<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
            'company_id'      => 'nullable|exists:companies,id',
            'gender_id'       => 'nullable|exists:genders,id',
            'partner_type'    => 'required|in:customer,supplier,both',
            'full_name'       => 'required|string|max:255',
            'tax_identifier'  => 'nullable|string|max:25|unique:partners,tax_identifier',
            'comments'        => 'nullable|string',
            'birthday'        => 'nullable|date',
            'birthday_email'  => 'boolean',
            'is_enabled'      => 'boolean',
        ];
    }
}
