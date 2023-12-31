<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'position' => ['required', 'string', 'max:255'],
            'more' => ['required', 'string'],
            // 'image' => 'required|mimes:jpeg,png,jpg',
        ];
    }
}
