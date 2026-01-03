<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Category::create([
        'name' => 'O\'zbekiston',
        'slug' => 'O\'zbekiston'
    ]);

    \App\Models\Category::create([
        'name' => 'Jahon',
        'slug' => 'Jahon'
    ]);
    \App\Models\Category::create([
        'name' => 'Siyosat',
        'slug' => 'siyosat'
    ]);
    \App\Models\Category::create([
        'name' => 'Sport',
        'slug' => 'sport'
    ]);
     \App\Models\Category::create([
        'name' => 'Jamiyat',
        'slug' => 'jamiyat'
    ]);
     \App\Models\Category::create([
        'name' => 'Ta\'lim',
        'slug' => 'ta\'lim'
    ]);
     \App\Models\Category::create([
        'name' => 'Moliya',
        'slug' => 'moliya'
    ]);
     \App\Models\Category::create([
        'name' => 'Turizm',
        'slug' => 'turizm'
    ]);
     \App\Models\Category::create([
        'name' => 'Biznes',
        'slug' => 'biznes'
    ]);
  
    
}
}
