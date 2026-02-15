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
        Schema::table('kurra_apps', function (Blueprint $table) {
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('is_convicted')->nullable();
            $table->string('convicted')->nullable();
            $table->string('is_dismissed')->nullable();
            $table->string('dismissed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kurra_apps', function (Blueprint $table) {
            $table->dropColumn([
                'current_salary',
                'expected_salary',
                'is_convicted',
                'convicted',
                'is_dismissed',
                'dismissed'
            ]);
        });
    }
};
