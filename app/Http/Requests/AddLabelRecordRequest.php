<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLabelRecordRequest extends FormRequest
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
            'user_details_id' => ['nullable', 'numeric', 'min:0'],
            'spending_category_id' => ['required', 'exists:spending_categories,id'],
        ];
    }
}
