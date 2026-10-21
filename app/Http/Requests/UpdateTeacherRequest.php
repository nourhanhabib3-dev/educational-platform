<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            "name"  => "required|string|max:50",
            "email" => ["required","email",Rule::unique('teachers' , 'email')->ignore($this->route('teacher'))],
            "phone" => "required|starts_with:01",
            "bio" => "required|string",
            "img" => "nullable|image|mimes:png,jpg,jpeg",
            "sub_id" => "required|exists:subs,id"
        ];
    }
}
