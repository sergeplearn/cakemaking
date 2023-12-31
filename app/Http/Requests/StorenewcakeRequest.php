<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorenewcakeRequest extends FormRequest
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
            'nameofperson' => ['required', 'string', 'max:255'],
            'nameofcake' => ['required', 'string', 'max:255'],
            'tell' => 'required|phone:AUTO,CM',
            'price' => ['required', 'string', 'max:255'],
            'more' => ['required'],

            // 'image' => 'required|mimes:jpeg,png,jpg, Rule::dimensions()->maxWidth(700),Rule::dimensions()->maxHeight(700) ',
        ];
    }

    public function messages()
    {
        return [
            'nameofperson.required' => 'the name of the person is required',
            'tell.phone' => 'required a validate cameroon number',
        ];
    }
}
