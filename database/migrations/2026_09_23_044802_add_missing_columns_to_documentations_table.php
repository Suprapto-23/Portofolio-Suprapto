<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documentations', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
            $table->text('content')->nullable()->after('category');
            $table->string('file_attachment')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('documentations', function (Blueprint $table) {
            $table->dropColumn(['slug', 'content', 'file_attachment']);
        });
    }
};