<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobapps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->nullable();
            $table->string('ref_token')->nullable();
            $table->string('app_date')->nullable();
            $table->string('app_status')->nullable();
            $table->string('app_email')->nullable();
            $table->string('app_id')->nullable();
            $table->string('status')->nullable();
            $table->string('signed')->nullable();
            $table->unsignedBigInteger('captured_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobapps');
    }
}
