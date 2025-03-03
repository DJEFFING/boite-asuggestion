<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = ["titre" =>"admin"];
        $role2 = ["titre" =>"user"];
        
        Role::create($role1);
        Role::create($role2);

    }
}
