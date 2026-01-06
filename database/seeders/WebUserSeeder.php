<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    \App\Models\WebUser::create([
        'name' => 'Foydalanuvchi',
        'email' => 'user@mail.com',
        'password' => bcrypt('password123'),
    ]);
}
}
