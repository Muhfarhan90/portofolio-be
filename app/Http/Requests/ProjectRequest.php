<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
        $projectId = $this->route('project') ? $this->route('project')->id : null;

        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack'  => 'nullable|string|max:255',
            'repo_url'    => 'nullable|url',
            'live_url'    => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
