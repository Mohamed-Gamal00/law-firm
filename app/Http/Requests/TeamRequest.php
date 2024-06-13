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
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'قد لا يتجاوز الاسم 255 حرفًا.',
            'image.image' => 'يجب أن تكون الصورة ملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة من نوع: jpeg، png، jpg، gif، svg.',
            'image.max' => 'قد لا تتجاوز الصورة 2048 كيلوبايت.',
            'job_title.string' => 'يجب أن يكون عنوان الوظيفة نصًا.',
            'job_title.max' => 'قد لا يتجاوز عنوان الوظيفة 255 حرفًا.',
            'experience.integer' => 'يجب أن يكون الخبرة عددًا صحيحًا.',
            'experience.min' => 'يجب أن تكون الخبرة على الأقل 0.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صحيح.',
            'email.max' => 'قد لا يتجاوز البريد الإلكتروني 255 حرفًا.',
            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.regex' => 'تنسيق رقم الهاتف غير صحيح.',
            'phone.string' => 'يجب أن يكون رقم الهاتف نصًا.',
            'phone.max' => 'قد لا يتجاوز رقم الهاتف 20 حرفًا.',
            'twitter.string' => 'يجب أن يكون اسم المستخدم في تويتر نصًا.',
            'twitter.url' => 'يجب أن يكون اسم المستخدم في تويتر رابطًا صحيحًا.',
            'twitter.max' => 'قد لا يتجاوز اسم المستخدم في تويتر 255 حرفًا.',
            'facebook.string' => 'يجب أن يكون الحساب على فيسبوك نصًا.',
            'facebook.url' => 'يجب أن يكون الحساب على فيسبوك رابطًا صحيحًا.',
            'facebook.max' => 'قد لا يتجاوز الحساب على فيسبوك 255 حرفًا.',
            'instagram.string' => 'يجب أن يكون اسم المستخدم في إنستجرام نصًا.',
            'instagram.url' => 'يجب أن يكون اسم المستخدم في إنستجرام رابطًا صحيحًا.',
            'instagram.max' => 'قد لا يتجاوز اسم المستخدم في إنستجرام 255 حرفًا.',
            'linked_in.string' => 'يجب أن يكون الحساب على LinkedIn نصًا.',
            'linked_in.url' => 'يجب أن يكون الحساب على LinkedIn رابطًا صحيحًا.',
            'linked_in.max' => 'قد لا يتجاوز الحساب على LinkedIn 255 حرفًا.',
            'certifications.string' => 'يجب أن تكون الشهادات نصًا.',
            'certifications.max' => 'قد لا تتجاوز الشهادات 255 حرفًا.',
        ];
    }
}
