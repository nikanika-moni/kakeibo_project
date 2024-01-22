<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
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
            'users' => ['nullable', 'numeric', 'min:0'],
            'employment_id' => ['required', 'numeric', 'min:0'],
            'net_income' => ['required', 'numeric', 'min:0'],
            'rent' => ['required', 'numeric', 'min:0'],
            'entertainment_expenses' => ['required', 'numeric', 'min:0'],
            'transportation_expenses' => ['required', 'numeric', 'min:0'],
            'food_expenses' => ['required', 'numeric', 'min:0'],
            'entertainment' => ['required', 'numeric', 'min:0'],
            'savings_so_far' => ['required', 'numeric', 'min:0'],
            'average_savings' => ['required', 'numeric', 'min:0'],
        ];
    }
}
