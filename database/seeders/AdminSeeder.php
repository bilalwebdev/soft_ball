<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'title' => 'Super-Admin',
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'type' => 'SUPER_ADMIN',
                'image' => 'null',
                'password' => Hash::make('12345678')
            ]
        );
    }
}
