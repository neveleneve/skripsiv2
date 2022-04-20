<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Mohammad Farid Hasymi',
                'username' => 'administrator',
                'email' => 'frdhsym@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('administrator'),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mohammad Farid Hasymi',
                'username' => 'neveleneve',
                'email' => 'pandupandu813@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('userbiasa'),
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Abdul Latief',
                'username' => 'abdullatief',
                'email' => 'abdulliaman@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('userbiasa'),
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Abdi Negoro',
                'username' => 'abdinegoro',
                'email' => 'abdinegoro@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('userbiasa'),
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
