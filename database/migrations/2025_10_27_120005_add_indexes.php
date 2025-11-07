<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('planner_tasks', function (Blueprint $t) {
            $t->index(['user_id','due_at']);
        });
        Schema::table('study_blocks', function (Blueprint $t) {
            $t->index(['user_id','start_at']);
        });
    }
    public function down(): void {
        Schema::table('planner_tasks', function (Blueprint $t) {
            $t->dropIndex(['planner_tasks_user_id_due_at_index']);
        });
        Schema::table('study_blocks', function (Blueprint $t) {
            $t->dropIndex(['study_blocks_user_id_start_at_index']);
        });
    }
};
