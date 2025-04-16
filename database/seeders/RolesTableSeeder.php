<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Role::ROLE_ALL_ROLES as $role) {
            Role::updateOrCreate(['name' => $role]);
        }
    }

}
