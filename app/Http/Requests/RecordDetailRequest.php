<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecordDetailRequest extends FormRequest
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
        // return [
        //     'spending_label_intermediate_ids.*' => ['nullable', 'numeric', 'exists:spending_label_intermediate,id'],
        //     'date' => ['required', 'date'],
        //     'amounts.*' => ['required', 'numeric', 'min:0'],
        //     'memos.*' => ['nullable', 'string', 'max:60'],
        // ];


        return [
            'spending_label_intermediate_ids.*' => ['nullable', 'numeric', 'exists:spending_label_intermediate,id'],
            'dates.*' => [
                'required',
                'date',
                Rule::unique('record_detail')->where(function ($query) {
                    $query->whereIn('spending_label_intermediate_id', $this->input('spending_label_intermediate_ids'))
                          ->whereIn('dates', $this->input('dates'));
                }),
            ],
            'amounts.*' => ['required', 'numeric', 'min:0'],
            'memos.*' => ['nullable', 'string', 'max:60'],
        ];
    }
}
