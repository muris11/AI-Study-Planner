<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('nudges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('channel');
            $table->timestamp('schedule_at');
            $table->text('message');
            $table->string('status')->default('queued');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('nudges');
    }
};
