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
      Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('article_id')->constrained()->onDelete('cascade'); 
    
    $table->foreignId('web_user_id')->constrained('web_users')->onDelete('cascade');
    $table->unsignedBigInteger('parent_id')->nullable(); // Izohga javob bo'lsa
    $table->text('body');
    $table->boolean('is_approved')->default(false); // Yangiliklar saytida moderatsiya shart
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
