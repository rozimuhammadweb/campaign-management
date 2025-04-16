<?php

namespace App\Http\Requests\Company;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CompanyListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can("view-company");
    }
}
