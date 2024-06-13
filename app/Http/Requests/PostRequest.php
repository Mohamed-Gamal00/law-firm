<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image',
            'content' => 'required|string',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نصيًا.',
            'title.max' => 'لا يمكن أن يكون العنوان أكبر من 255 حرفًا.',
            'category_id.required' => 'القسم مطلوب.',
            'category_id.exists' => 'القسم المحدد غير صالح.',
            'image.image' => 'يجب أن تكون الصورة ملف صورة.',
            'content.required' => 'المحتوى مطلوب.',
            'content.string' => 'يجب أن يكون المحتوى نصيًا.',
        ];
    }
}
