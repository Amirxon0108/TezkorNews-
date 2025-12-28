<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'email',
    'password',
    'role_id', // Role jadvali bilan bog'lovchi ID
    'username',
    'avatar',
    
];

// Foydalanuvchining rolini aniqlash uchun
public function role()
{
    return $this->belongsTo(Role::class);
}
}
