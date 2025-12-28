<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable = [
    'article_id',  // Qaysi maqolaga yozilgan
    'user_id',     // Kim yozgan
    'parent_id',   // Agar biror izohga javob bo'lsa, o'sha izohning ID-si
    'body',        // Izoh matni
    'is_approved', // Admin tasdiqlashi uchun (Spamdan himoya)
];

// Qaysi maqolaga tegishli ekanligi
public function article()
{
    return $this->belongsTo(Article::class);
}

// Kim yozgani
public function user()
{
    return $this->belongsTo(User::class);
}

// Izohning ichidagi javoblarni olish (Recursive relationship)
public function replies()
{
    return $this->hasMany(Comment::class, 'parent_id');
}
}
