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
        $val = 'required|unique:courses,name';
        $img = 'required|image|mimes:png,jpg,jpeg';
        if($this->method() == 'PUT') {
            $val = 'required|unique:courses,name,'.$this->id;
            $img = 'nullable|image|mimes:png,jpg,jpeg';
        }
        return [
            'name' => $val,
            'image' => $img,
            'instructor' => '',
            'hours' => 'required',
            'content' => 'required'
        ];
    }
}
