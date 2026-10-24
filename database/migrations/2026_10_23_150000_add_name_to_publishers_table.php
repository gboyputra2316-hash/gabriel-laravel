<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('books') && ! Schema::hasColumn('books', 'published_year')) {
            Schema::table('books', function (Blueprint $table) {
                $table->year('published_year')->nullable();
            });
        }

        if (! Schema::hasColumn('publishers', 'name')) {
            Schema::table('publishers', function (Blueprint $table) {
                $table->string('name')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('books') && Schema::hasColumn('books', 'published_year')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('published_year');
            });
        }

        if (Schema::hasColumn('publishers', 'name')) {
            Schema::table('publishers', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }
    }
};