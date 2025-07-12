<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'institution' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'start_year' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'end_year' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 5),
            'location' => 'nullable|string|max:255',
            'gpa' => 'nullable|numeric|between:0,4.00',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
        ];
    }
}
