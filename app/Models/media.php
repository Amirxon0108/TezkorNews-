<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',      // Faylni yuklagan odam
    'file_name',    // Faylning asl nomi (masalan: rasm.jpg)
    'file_path',    // Serverdagi yoki S3 dagi yo'li
    'file_type',    // image/jpeg, video/mp4, application/pdf
    'file_size',    // Fayl hajmi (baytlarda)
    'file_ext',     // Fayl kengaytmasi (jpg, png)
    'alt_text',     // SEO uchun rasm tavsifi
];

// Faylni yuklagan foydalanuvchi bilan bog'liqlik
public function user() {
    return $this->belongsTo(User::class);
}
}
