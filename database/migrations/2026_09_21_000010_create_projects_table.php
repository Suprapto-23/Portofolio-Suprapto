<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('client')->nullable();
            $table->string('role')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('project_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->json('gallery')->nullable();
            $table->json('features')->nullable();
            $table->string('status')->default('completed');
            $table->date('project_date')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
