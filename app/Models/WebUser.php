<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// Bu qatordagi Model klassi endi kerak emas, lekin tursa ham zarar qilmaydi
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// BU YERDA 'Model' emas, 'Authenticatable' bo'lishi shart:
class WebUser extends Authenticatable 
{
    use HasFactory, Notifiable;

    protected $table = 'web_users';

    protected $fillable = [
        'name', 
        'email', 
        'password'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ];
}