<?php

namespace Database\Seeders;

use App\Policies\Company\CompanyPolicy;

class CompanyPolicySeeder extends BasePolicySeeder
{
    public string $policy = CompanyPolicy::class;
}
