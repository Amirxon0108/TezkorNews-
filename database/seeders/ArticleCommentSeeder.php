<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleCommentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Test uchun bitta maqola yaratamiz
        $article = Article::create([
            'category_id' => 1, // Kategoriya mavjudligiga ishonch hosil qiling
            'author_id'   => 1, // User mavjudligiga ishonch hosil qiling
            'title'       => 'Birinchi test maqola',
            'slug'        => Str::slug('Birinchi test maqola'),
            'excerpt'     => 'Bu maqola seeder orqali yaratildi.',
            'body'        => 'Bu maqolaning to`liq matni hisoblanadi.',
            'status'      => 'published',
            'published_at'=> now(),
        ]);

        // 2. Ushbu maqolaga bir nechta izoh qo'shamiz
        Comment::create([
            'article_id'  => $article->id,
            'user_id'     => 1,
            'body'        => 'Ajoyib maqola bo`libdi, rahmat!',
            'is_approved' => true, // Tasdiqlangan izoh
        ]);

        Comment::create([
            'article_id'  => $article->id,
            'user_id'     => 1,
            'body'        => 'Yana shunaqa maqolalar kutib qolamiz.',
            'is_approved' => false, // Tasdiqlanmagan (Admin panelda ko'rinishi uchun)
        ]);
    }
}