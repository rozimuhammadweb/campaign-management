<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $admin_role = User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("password123"),
        ]);
        $admin_role->assignRole(Role::ROLE_ADMIN);

        $company = Company::create([
            'name' => 'company llc',
            'head_fio' => 'head fio',
            'location' => 'Fergana, Uzbekistan',
            'email' => "company@info.com",
            'website' => 'company.com',
            'phone_number' => '+998909656688',
        ]);

        $company_role = User::create([
            "name" => "company",
            "email" => "company@gmail.com",
            "password" => Hash::make("password123"),
            'company_id' => $company->id,
        ]);
        $company_role->assignRole(Role::ROLE_COMPANY);
    }
}
