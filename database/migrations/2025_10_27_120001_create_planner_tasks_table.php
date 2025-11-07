<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('planner_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('course_id')->nullable();
            $table->string('title');
            $table->string('type');
            $table->timestamp('due_at')->nullable();
            $table->decimal('weight_pct', 5, 2)->nullable();
            $table->integer('difficulty')->nullable();
            $table->integer('competency_self')->nullable();
            $table->decimal('estimated_effort_hours', 5, 2)->nullable();
            $table->json('priority_components')->nullable();
            $table->string('status')->default('todo');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('planner_tasks');
    }
};
