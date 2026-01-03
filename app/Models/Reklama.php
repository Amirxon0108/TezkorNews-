<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reklama extends Model
{
    use HasFactory;
    protected $table = "reklamalar";
    protected $fillable=[
        'title',
        'link_url',
        'position',
        'image_path',
        'is_active',
        'sort_order'
    ];
}   
