<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can("create-company");
    }

    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255"],
            "head_fio" => ["required", "string", "max:255"],
            "location" => ["required", "string", "max:255"],
            "email" => ["required", "string", "max:255", "unique:companies"],
            "website" => ["required", "string", "max:255"],
            "phone_number" => ["required", "string", "max:255"],
        ];
    }
}
