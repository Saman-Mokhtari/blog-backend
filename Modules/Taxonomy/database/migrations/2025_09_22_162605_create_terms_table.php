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
        Schema::create('terms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('term');
            $table->string('slug');
            $table->foreignUuid('taxonomy_id')
                ->constrained('taxonomies')
                ->cascadeOnDelete();
            $table->foreignUuid('parent_id')
                ->nullable()
                ->constrained('terms')
                ->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->unique(['taxonomy_id', 'slug']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};
