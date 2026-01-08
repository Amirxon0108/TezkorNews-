<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        roles::create([
           
            'name' =>'Admin',
            'role' =>'adminstrator'
        ]);
        roles::create([
            'name' =>'Editor',
            'role' =>'editor'
        ]);
    }
}
