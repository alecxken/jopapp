<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('kurra_apps')) {
            return;
        }

        Schema::table('kurra_apps', function (Blueprint $table) {

            if (!Schema::hasColumn('kurra_apps', 'current_salary')) {
                $table->string('current_salary')->nullable();
            }

            if (!Schema::hasColumn('kurra_apps', 'expected_salary')) {
                $table->string('expected_salary')->nullable();
            }

            if (!Schema::hasColumn('kurra_apps', 'is_convicted')) {
                $table->string('is_convicted')->nullable();
            }

            if (!Schema::hasColumn('kurra_apps', 'convicted')) {
                $table->string('convicted')->nullable();
            }

            if (!Schema::hasColumn('kurra_apps', 'is_dismissed')) {
                $table->string('is_dismissed')->nullable();
            }

            if (!Schema::hasColumn('kurra_apps', 'dismissed')) {
                $table->string('dismissed')->nullable();
            }

        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('kurra_apps')) {
            return;
        }

        Schema::table('kurra_apps', function (Blueprint $table) {

            $columns = [
                'current_salary',
                'expected_salary',
                'is_convicted',
                'convicted',
                'is_dismissed',
                'dismissed'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('kurra_apps', $column)) {
                    $table->dropColumn($column);
                }
            }

        });
    }
};
