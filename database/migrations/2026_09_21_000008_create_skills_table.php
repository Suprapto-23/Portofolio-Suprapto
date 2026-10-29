<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_category_id')
                ->nullable()
                ->constrained('skill_categories')
                ->nullOnDelete();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('proficiency')->default(80);
            $table->decimal('years_experience', 3, 1)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
