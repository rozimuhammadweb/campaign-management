<?php

namespace App\Policies\Employee;

namespace App\Policies\Employee;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use App\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy extends BasePolicy
{
    use HandlesAuthorization;

    const VIEW_EMPLOYEE = 'view-employee';
    const CREATE_EMPLOYEE = 'create-employee';
    const UPDATE_EMPLOYEE = 'update-employee';
    const DELETE_EMPLOYEE = 'delete-employee';

    public static function getRolePermissions(): array
    {
        return [
            Role::ROLE_ADMIN_ID => [
                self::VIEW_EMPLOYEE,
            ],
            Role::ROLE_COMPANY_ID => [
                self::VIEW_EMPLOYEE,
                self::CREATE_EMPLOYEE,
                self::UPDATE_EMPLOYEE,
                self::DELETE_EMPLOYEE,
            ]
        ];
    }

    public function viewEmployee(User $user, Employee $employee): bool
    {
        return (
                $user->hasRole(Role::ROLE_ADMIN_ID)
                && $user->hasPermissionTo(self::VIEW_EMPLOYEE)
            ) || (
                $user->hasRole(Role::ROLE_COMPANY_ID)
                && $user->hasPermissionTo(self::VIEW_EMPLOYEE)
                && $user->company_id == $employee->company_id
            );
    }

    public function createEmployee(User $user): bool
    {
        return $user->hasRole(Role::ROLE_COMPANY_ID)
            && $user->hasPermissionTo(self::CREATE_EMPLOYEE);
    }

    public function updateEmployee(User $user, Employee $employee): bool
    {
        return $user->hasRole(Role::ROLE_COMPANY_ID)
            && $user->hasPermissionTo(self::UPDATE_EMPLOYEE)
            && $user->company_id == $employee->company_id;
    }

    public function deleteEmployee(User $user, Employee $employee): bool
    {
        return $user->hasRole(Role::ROLE_COMPANY_ID)
            && $user->hasPermissionTo(self::DELETE_EMPLOYEE)
            && $user->company_id == $employee->company_id;

    }
}

