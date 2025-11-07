<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('nudges')) return;
        try {
            Schema::table('nudges', function (Blueprint $table) {
                $table->index(['status', 'schedule_at'], 'nudges_status_schedule_at_index');
                $table->index(['user_id', 'schedule_at'], 'nudges_user_schedule_at_index');
            });
        } catch (\Throwable $e) {
            // Ignore if indexes already exist
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('nudges')) return;
        try {
            Schema::table('nudges', function (Blueprint $table) {
                $table->dropIndex('nudges_status_schedule_at_index');
                $table->dropIndex('nudges_user_schedule_at_index');
            });
        } catch (\Throwable $e) {
            // ignore
        }
    }
};
