<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        UserSeeder::class,        // 1-Admin yaratiladi
        WebUserSeeder::class,     // 2-Foydalanuvchi yaratiladi
        CategorySeeder::class,    // 3-Kategoriya (agar alohida bo'lsa)
        ArticleCommentSeeder::class, // 4-Oxirida maqola va izohlar
    ]);
}
}
