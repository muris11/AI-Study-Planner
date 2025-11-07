<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('user_prefs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('preferred_days')->nullable();
            $table->integer('pomodoro_minutes')->default(25);
            $table->integer('break_minutes')->default(5);
            $table->integer('max_daily_focus_blocks')->default(8);
            $table->json('mute_hours')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('user_prefs');
    }
};
