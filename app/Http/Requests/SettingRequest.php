<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|regex:/(01)[0-9]{9}/',
            'email' => 'nullable|email|max:255',
            'fax' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'fb_link' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'tw_link' => 'nullable|url|max:255',
            'insta_link' => 'nullable|url|max:255',
            'linkdin_link' => 'nullable|url|max:255',
            'footer_content_right' => 'nullable|string',
            'footer_content_left' => 'nullable|string',
            'booking_title' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ];
    }
}
