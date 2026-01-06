<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
    'article_id',  
    'web_user_id',    
    'parent_id', 
    'body',        
    'is_approved', 
];

// Qaysi maqolaga tegishli ekanligi
public function article()
{
    return $this->belongsTo(Article::class);
}


public function webUser()
{
    return $this->belongsTo(WebUser::class, 'web_user_id','id');
}


public function replies()
{
    return $this->hasMany(Comment::class, 'parent_id')->where('is_approved', true);
}
public function parent(){
    return $this->belongsTo(Comment::class, 'parent_id' );
}
}
