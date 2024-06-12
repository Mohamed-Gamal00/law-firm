<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutContentRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_link' => 'nullable|url|max:255',
            'video_title' => 'nullable|string|max:255',
            'video_content' => 'nullable|string',
            'points' => 'required|array|min:1',
            'points.*' => 'required|string',
            'team_work' => 'nullable|string|max:255',
            'happy_clients' => 'nullable|string|max:255',
            'successful_lawsuits' => 'nullable|string|max:255',
            'successful_consultations' => 'nullable|string|max:255',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'content.required' => 'The content is required.',
            'content.string' => 'The content must be a string.',
        ];
    }
}
