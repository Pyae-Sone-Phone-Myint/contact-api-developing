<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactApiRequest extends FormRequest
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
            "name" => "nullable|min:1|max:20",
            "country_code" => "nullable|integer|min:1|max:193",
            "phone_number" => "nullable|min:7|max:15",
            "email" => "nullable|email",
            "company" => "nullable",
            "job_title" => "nullable",
            "birthday" => "nullable",
        ];
    }
}
