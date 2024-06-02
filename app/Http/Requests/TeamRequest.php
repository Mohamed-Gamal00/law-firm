<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'job_title' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/(01)[0-9]{9}/', // Consider a phone validation package for better validation
            'twitter' => 'nullable|string|url|max:255',
            'facebook' => 'nullable|string|url|max:255',
            'instagram' => 'nullable|string|url|max:255',
            'linked_in' => 'nullable|string|url|max:255',
            'certifications' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'job_title.string' => 'The job title must be a string.',
            'job_title.max' => 'The job title may not be greater than 255 characters.',
            'experience.integer' => 'The experience must be an integer.',
            'experience.min' => 'The experience must be at least 0.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone field format is invalid.',
            'phone.string' => 'The phone number must be a string.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',
            'twitter.string' => 'The Twitter handle must be a string.',
            'twitter.url' => 'The Twitter handle must be a valid URL.',
            'twitter.max' => 'The Twitter handle may not be greater than 255 characters.',
            'facebook.string' => 'The Facebook profile must be a string.',
            'facebook.url' => 'The Facebook profile must be a valid URL.',
            'facebook.max' => 'The Facebook profile may not be greater than 255 characters.',
            'instagram.string' => 'The Instagram handle must be a string.',
            'instagram.url' => 'The Instagram handle must be a valid URL.',
            'instagram.max' => 'The Instagram handle may not be greater than 255 characters.',
            'linked_in.string' => 'The LinkedIn profile must be a string.',
            'linked_in.url' => 'The LinkedIn profile must be a valid URL.',
            'linked_in.max' => 'The LinkedIn profile may not be greater than 255 characters.',
            'certifications.string' => 'The certifications must be a string.',
            'certifications.max' => 'The certifications may not be greater than 255 characters.',
        ];
    }
}
