<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Policies\BasePolicy;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class BasePolicySeeder extends Seeder
{
    public string $policy = BasePolicy::class;

    public function run(): void
    {
        foreach ($this->policy::getRolePermissions() as $role_id => $permissions) {
            $role = Role::find($role_id);
            if (!$role) {
                continue;
            }

            foreach ($permissions as $permission) {
                if (Permission::updateOrCreate(['name' => $permission])) {
                    $role->givePermissionTo($permission);
                }
            }

        }
    }
}
