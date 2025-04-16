<?php

namespace Database\Seeders;

use App\Policies\Employee\EmployeePolicy;

class EmployeePolicySeeder extends BasePolicySeeder
{
    public string $policy = EmployeePolicy::class;

}
