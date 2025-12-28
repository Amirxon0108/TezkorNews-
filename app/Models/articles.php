<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    use HasFactory;
    protected $fillable = [
    'category_id',    // Maqola qaysi kategoriyaga tegishli
    'author_id',      // Kim yozgan (User ID)
    'title',          // Maqola nomi
    'slug',           // URL uchun (masalan: sayt.uz/news/yangilik-nomi)
    'excerpt',        // Maqolaning qisqacha tavsifi (bosh sahifada chiqadi)
    'body',           // To'liq matn
    'thumbnail',      // Asosiy rasm yo'li
    'status',         // draft, published yoki scheduled
    'views_count',    // Necha marta o'qilgani
    'is_featured',    // "Asosiy yangilik" sifatida belgilash
    'meta_title',     // SEO uchun sarlavha
    'meta_description', // SEO uchun tavsif
    'published_at',   // Chop etilgan sana
];  
// Maqola muallifini olish
public function author()
{
    return $this->belongsTo(User::class, 'author_id');
}

// Maqola kategoriyasini olish
public function category()
{
    return $this->belongsTo(Category::class);
}

// Maqolaga tegishli izohlarni olish
public function comments()
{
    return $this->hasMany(Comment::class);
}

// Maqolaga biriktirilgan teglar (Tags)
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
// Faqat chop etilgan maqolalarni oson chaqirish: Article::published()->get();
public function scopePublished($query)
{
    return $query->where('status', 'published')
                 ->where('published_at', '<=', now());
}

// Maqola o'qish vaqtini taxminiy hisoblash (Foydalanuvchiga qulaylik)
public function getReadingTimeAttribute()
{
    $words = str_word_count(strip_tags($this->body));
    $minutes = ceil($words / 200); // O'rtacha 200 ta so'z/daqiqa
    return $minutes . ' daqiqa o`qish';
}
}
