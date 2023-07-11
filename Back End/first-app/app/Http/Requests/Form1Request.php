<?php

namespace App\Http\Requests;

use App\Rules\WordsCount;
use Illuminate\Foundation\Http\FormRequest;

class Form1Request extends FormRequest
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
        return [
            'name' => 'required|min:4|max:30',
            'email' => 'required|email|ends_with:@gmail.com|unique:users,email,'.$this->email,
            'bio' => ['nullable', new WordsCount(5)],
        ];
    }

    function messages() : array {
        return [
            'required' => 'field requiredddddddd'
        ];
    }
}
