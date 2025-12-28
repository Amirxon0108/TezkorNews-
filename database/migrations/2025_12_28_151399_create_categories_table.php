<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Kategoriya nomi: Sport, Siyosat va hokazo
        $table->string('slug')->unique(); // URL uchun: sayt.uz/category/sport
        $table->string('image')->nullable(); // Kategoriya uchun rasm (ixtiyoriy)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
