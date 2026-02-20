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
        //
        User::create([
        'name' => 'Bank',
        'email' => 'bank@test.com',
        'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Alice',
            'email' => 'alice@test.com',
            'password' => bcrypt('password')
        ]);
    }
}
