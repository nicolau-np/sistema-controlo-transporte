<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    static $users = [
        [
            'name' => "Nicha",
            'username' => "user.nicha",
            'nivel_acesso' => "admin",
            'password' => "transporte001",
        ], [
            'name' => "Alfredo",
            'username' => "user.alfredo",
            'nivel_acesso' => "user",
            'password' => "transporte001",
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Self::$users as $user) {
            User::create($user);
        }
    }
}
