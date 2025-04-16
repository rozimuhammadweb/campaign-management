<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can("update-company");
    }

    public function rules(): array
    {
        return [
            "name" => ["sometimes", "string", "max:255"],
            "head_fio" => ["sometimes", "string", "max:255"],
            "location" => ["sometimes", "string", "max:255"],
            "email" => ["sometimes", "string", "email", "max:255", "unique:companies,email"],
            "website" => ["sometimes", "string", "max:255"],
            "phone_number" => ["sometimes", "string", "max:255"],
        ];
    }
}
