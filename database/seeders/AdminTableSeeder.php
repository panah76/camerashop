<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'zeezee',
            'email' => 'zeezee@gmail.com',
            'username' => 'zeezee',
            'password' => Hash::make('123'),
        ]);

    }
}
