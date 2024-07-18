<?php

namespace App\Domain\Faculties\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacultyRequest extends FormRequest
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
            'fullname' => 'required',
            'phone' => 'required',
            'job_position' => 'required',
            'job_time' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|max:5120|mimes:png,jpg,jpeg',
            'path' => 'nullable|string',
        ];
    }
}
