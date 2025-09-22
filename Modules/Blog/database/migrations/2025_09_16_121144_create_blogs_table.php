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
        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('excerp')->nullable();
            $table->longText('content');
            $table->unsignedBigInteger('likes')->default(0);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('cover')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->json('meta_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
