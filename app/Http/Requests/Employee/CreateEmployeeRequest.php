<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can("create-employee");
    }

    public function rules(): array
    {
        return [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "fathers_name" => "required|string",
            "passport_number" => "required|string",
            "position" => "required|string",
            "phone_number" => "required|string",
            "address" => "required|string",
            "company_id" => "required|exists:companies,id",
        ];
    }
}
