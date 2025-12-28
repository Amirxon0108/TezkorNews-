<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
   protected $fillable = [
    'id',
    'name',  
    'role',  
];


public function users()
{
    return $this->hasMany(User::class);
}
}
