<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Employee;
use App\Policies\Company\CompanyPolicy;
use App\Policies\Employee\EmployeePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class PolicyServiceProvider extends ServiceProvider
{
    protected $policies = [
        Company::class  => CompanyPolicy::class,
        Employee::class  => EmployeePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();


        foreach ($this->policies as $name => $policy) {
            $methods = get_class_methods($policy);

            Gate::resource($name, $policy, array_combine($methods, $methods));
        }
    }
}
