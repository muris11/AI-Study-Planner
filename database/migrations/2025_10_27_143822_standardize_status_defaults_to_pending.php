<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        // Normalize existing records
        DB::table('nudges')->where('status', 'queued')->update(['status' => 'pending']);

        // Align default to 'pending'
        $driver = DB::getDriverName();
        if (Schema::hasTable('nudges')) {
            if ($driver === 'mysql') {
                DB::statement("ALTER TABLE nudges MODIFY status VARCHAR(255) NOT NULL DEFAULT 'pending'");
            } elseif ($driver === 'pgsql') {
                DB::statement("ALTER TABLE nudges ALTER COLUMN status SET DEFAULT 'pending'");
            } else {
                // Fallback: attempt schema change if supported
                try {
                    Schema::table('nudges', function (Blueprint $table) {
                        $table->string('status')->default('pending')->change();
                    });
                } catch (\Throwable $e) {
                    // No-op if the platform cannot change default via schema builder
                }
            }
        }
    }

    public function down(): void
    {
        $driver = DB::getDriverName();
        if (Schema::hasTable('nudges')) {
            if ($driver === 'mysql') {
                DB::statement("ALTER TABLE nudges MODIFY status VARCHAR(255) NOT NULL DEFAULT 'queued'");
            } elseif ($driver === 'pgsql') {
                DB::statement("ALTER TABLE nudges ALTER COLUMN status SET DEFAULT 'queued'");
            } else {
                try {
                    Schema::table('nudges', function (Blueprint $table) {
                        $table->string('status')->default('queued')->change();
                    });
                } catch (\Throwable $e) {
                    // ignore
                }
            }
        }
    }
};
