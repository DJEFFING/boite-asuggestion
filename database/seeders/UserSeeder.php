<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = ["pseudo"=>"garnel00345","password"=>"garnel123"];
        $user2 = ["pseudo"=>"rick00345","password"=>"rick123"];
        $user3 = ["pseudo"=>"djeff00345","password"=>"djeff123"];

        User::create($user1);
        User::create($user2);
        User::create($user3);
    }
}
