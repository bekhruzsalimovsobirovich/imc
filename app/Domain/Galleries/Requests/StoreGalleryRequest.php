<?php

namespace App\Domain\Galleries\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            'img' => 'nullable|max:102400|mimes:png,jpg,jpeg,heic',
            'video' => 'nullable|max:102400|mimes:mp4,avif',
            'img_path' => 'nullable|string',
            'video_path' => 'nullable|string',
        ];
    }
}
