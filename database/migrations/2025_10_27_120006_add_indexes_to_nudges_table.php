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
        Schema::table('nudges', function (Blueprint $table) {
            $table->index(['status', 'schedule_at'], 'nudges_status_schedule_at_index');
            $table->index(['user_id', 'schedule_at'], 'nudges_user_schedule_at_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nudges', function (Blueprint $table) {
            $table->dropIndex('nudges_status_schedule_at_index');
            $table->dropIndex('nudges_user_schedule_at_index');
        });
    }
};
