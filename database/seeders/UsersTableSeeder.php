<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1234'),
            'roles' => 'ADMIN'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user1234'),
            'roles' => 'USER'
        ]);
    }
}
