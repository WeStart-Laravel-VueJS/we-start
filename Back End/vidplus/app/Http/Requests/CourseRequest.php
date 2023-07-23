<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // dd($this->method());
        $name_en = 'required|unique:courses,name_en';
        $name_ar = 'required|unique:courses,name_ar';
        $img = 'required|image|mimes:png,jpg,jpeg';
        if($this->method() == 'PUT') {
            $name_en = 'required|unique:courses,name_en,'.$this->id;
            $name_ar = 'required|unique:courses,name_ar,'.$this->id;
            $img = 'nullable|image|mimes:png,jpg,jpeg';
        }
        return [
            'name_en' => $name_en,
            'name_ar' => $name_ar,
            'image' => $img,
            'instructor' => '',
            'hours' => 'required',
            'content' => 'required'
        ];
    }
}
