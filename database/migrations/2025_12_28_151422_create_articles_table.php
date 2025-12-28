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
     Schema::create('articles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id')->constrained()->onDelete('cascade');
    $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
    $table->string('title');
    $table->string('slug')->unique(); // Indeks va unikal bo'lishi shart
    $table->text('excerpt')->nullable();
    $table->longText('body');
    $table->string('thumbnail')->nullable();
    $table->enum('status', ['draft', 'published', 'scheduled'])->default('draft');
    $table->unsignedBigInteger('views_count')->default(0);
    $table->boolean('is_featured')->default(false); // VIP yangiliklar uchun
    
    // SEO uchun
    $table->string('meta_title')->nullable();
    $table->string('meta_description')->nullable();

    $table->timestamp('published_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
