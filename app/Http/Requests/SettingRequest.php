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
            'logo' => 'nullable|image',
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

    public function messages()
    {
        return [
            'logo' => 'يجب أن يكون الحقل صورة من نوع ملف',
            'phone' => 'يجب أن يكون الحقل رقم الهاتف مكون من 11 رقم ويبدأ بـ 01.',
            'email' => 'يجب أن يكون الحقل عنوان بريد إلكتروني صالح ولا يتجاوز 255 حرفًا.',
            'fax' => 'يجب أن يكون الحقل نصيًا ولا يتجاوز 255 حرفًا.',
            'address' => 'يجب أن يكون الحقل نصيًا ولا يتجاوز 255 حرفًا.',
            'fb_link' => 'يجب أن يكون الحقل رابط صحيح على الفيسبوك ولا يتجاوز 255 حرفًا.',
            'whatsapp' => 'يجب أن يكون الحقل نصيًا ولا يتجاوز 255 حرفًا.',
            'tw_link' => 'يجب أن يكون الحقل رابط صحيح على تويتر ولا يتجاوز 255 حرفًا.',
            'insta_link' => 'يجب أن يكون الحقل رابط صحيح على إنستغرام ولا يتجاوز 255 حرفًا.',
            'linkdin_link' => 'يجب أن يكون الحقل رابط صحيح على لينكد إن ولا يتجاوز 255 حرفًا.',
            'footer_content_right' => 'يجب أن يكون الحقل نصيًا.',
            'footer_content_left' => 'يجب أن يكون الحقل نصيًا.',
            'booking_title' => 'يجب أن يكون الحقل عنوان صالح ولا يتجاوز 255 حرفًا.',
            'meta_title' => 'يجب أن يكون الحقل عنوان صالح ولا يتجاوز 255 حرفًا.',
            'meta_description' => 'يجب أن يكون الحقل وصف صالح ولا يتجاوز 255 حرفًا.',
            'meta_keywords' => 'يجب أن يكون الحقل كلمات مفتاحية صالحة ولا تتجاوز 255 حرفًا.',
        ];
    }
}
