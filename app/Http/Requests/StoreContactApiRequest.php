<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactApiRequest extends FormRequest
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
            "name" => "required",
            "country_code" => "required|min:1|max:193",
            "phone_number" => "required|min:7|max:15",
            "email" => "nullable|email",
            "company" => "nullable",
            "job_title" => "nullable",
            "birthday" => "nullable",
            "is_favorite" => "required"
        ];
    }
}
