<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
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
            'company_id' => 'nullable|exists:companies,id',
            'country_id' => 'nullable|exists:countries,id',
            'state_id'   => 'nullable|exists:states,id',
            'city_id'    => 'nullable|exists:cities,id',
            'name'        => 'required|string|max:255|',
            'description' => 'nullable|string|max:500',
            'address'     => 'nullable|string',
            'is_enabled'  => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do depósito é obrigatório.',
            'name.unique' => 'Esse nome de depósito já está em uso.',
            'company_id.exists' => 'Empresa inválida.',
            'country_id.exists' => 'País inválido.',
            'state_id.exists' => 'Estado inválido.',
            'city_id.exists' => 'Cidade inválida.',
        ];
    }
}
