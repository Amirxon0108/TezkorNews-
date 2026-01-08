<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    // Agar bazadagi jadvalingiz nomi 'roles' bo'lsa:
    protected $table = 'roles';

    protected $fillable = [
        'name',   // Masalan: "Admin" yoki "User"
        'role',   // Agarda qo'shimcha belgi bo'lsa
    ];

    public function users()
    {
        // roles jadvali ko'plab User'larga ega
        return $this->hasMany(User::class, 'role_id');
    }
}