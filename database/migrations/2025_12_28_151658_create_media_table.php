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
  Schema::create('media', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('file_name');
    $table->string('file_path');
    $table->string('file_type'); // Mime type
    $table->unsignedInteger('file_size');
    $table->string('file_ext', 10);
    $table->string('alt_text')->nullable(); // Rasm yuklanmasa o'rniga chiqadigan matn
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
