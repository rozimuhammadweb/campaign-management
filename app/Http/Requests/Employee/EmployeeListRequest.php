<?php

namespace App\Http\Requests\Employee;

use App\Models\Employee;
use App\Policies\Employee\EmployeePolicy;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can(EmployeePolicy::VIEW_EMPLOYEE);
    }
}
