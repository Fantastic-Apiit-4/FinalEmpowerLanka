<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users= [
            ['name' => 'Admin','email' => 'admin@gmail.com', 'password' => bcrypt(123456)],
            ['name' => 'User','email' => 'user@gmail.com', 'password' => bcrypt(123456)],
            ['name' => 'Head','email' => 'head@gmail.com', 'password' => bcrypt(123456)],
        ];

        foreach($users as $key => $value)
        {
           User::create($value);
        }
    }
}
