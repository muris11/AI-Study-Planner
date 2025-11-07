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
        Schema::table('study_blocks', function (Blueprint $table) {
            $table->unique(['user_id', 'start_at'], 'unique_user_start_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('study_blocks', function (Blueprint $table) {
            $table->dropUnique('unique_user_start_at');
        });
    }
};
