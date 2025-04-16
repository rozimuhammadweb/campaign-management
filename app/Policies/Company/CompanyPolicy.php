<?php

namespace App\Policies\Company;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy extends BasePolicy
{
    use HandlesAuthorization;
    const VIEW_COMPANY = 'view-company';
    const CREATE_COMPANY = 'create-company';
    const UPDATE_COMPANY = 'update-company';
    const DELETE_COMPANY = 'delete-company';

    public static function getRolePermissions(): array
    {
        return [
            Role::ROLE_ADMIN_ID => [
                self::VIEW_COMPANY,
                self::CREATE_COMPANY,
                self::UPDATE_COMPANY,
                self::DELETE_COMPANY,
            ],

            Role::ROLE_COMPANY_ID => [
                self::UPDATE_COMPANY,
            ]
        ];
    }

    public function viewCompany(User $user): bool
    {
        return $user->hasRole(Role::ROLE_ADMIN_ID)
            && $user->hasPermissionTo(self::VIEW_COMPANY);
    }

    public function createCompany(User $user): bool
    {
        return $user->hasRole(Role::ROLE_ADMIN_ID)
            && $user->hasPermissionTo(self::CREATE_COMPANY);
    }

    public function updateCompany(User $user, Company $company): bool
    {
        return (
                $user->hasRole(Role::ROLE_ADMIN_ID)
                && $user->hasPermissionTo(self::UPDATE_COMPANY)
            ) || (
                $user->hasRole(Role::ROLE_COMPANY_ID)
                && $user->hasPermissionTo(self::UPDATE_COMPANY)
                && $user->company_id === $company->id
            );
    }

    public function deleteCompany(User $user): bool
    {
        return $user->hasRole(Role::ROLE_ADMIN_ID)
            && $user->hasPermissionTo(self::DELETE_COMPANY);
    }

}
