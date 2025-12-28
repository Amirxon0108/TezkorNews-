<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;


    // Ommaviy to'ldiriladigan maydonlar
    protected $fillable = [
        'name', 
        'slug', 
        'image'
    ];

    /**
     * Ushbu kategoriyaga tegishli barcha maqolalarni olish.
     * Bu "One-to-Many" (Birga ko'p) munosabati.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

