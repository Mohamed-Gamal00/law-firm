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
            'title.required' => 'العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نص.',
            'title.max' => 'لا يجب أن يتجاوز العنوان 255 حرفًا.',
            'content.nullable' => 'المحتوى يجب أن يكون نصًا.',
            'video_link.nullable' => 'رابط الفيديو يجب أن يكون عنوان URL صالحاً ويمكن أن لا يزيد عن 255 حرفًا.',
            'video_title.nullable' => 'عنوان الفيديو يجب أن يكون نصًا ولا يزيد عن 255 حرفًا.',
            'video_content.nullable' => 'محتوى الفيديو يجب أن يكون نصًا.',
            'points.required' => 'النقاط مطلوبة ويجب أن تحتوي على عناصر واحدة على الأقل.',
            'points.array' => 'يجب أن تكون النقاط مصفوفة.',
            'points.*.required' => 'يجب أن تكون كل نقطة نصًا.',
            'team_work.nullable' => 'الحقل يجب أن يكون نصًا ولا يزيد عن 255 حرفًا.',
            'happy_clients.nullable' => 'الحقل يجب أن يكون نصًا ولا يزيد عن 255 حرفًا.',
            'successful_lawsuits.nullable' => 'الحقل يجب أن تكون نصًا ولا يزيد عن 255 حرفًا.',
            'successful_consultations.nullable' => 'الحقل يجب أن تكون نصًا ولا يزيد عن 255 حرفًا.',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'content.required' => 'The content is required.',
            'content.string' => 'The content must be a string.',
        ];
    }
}
