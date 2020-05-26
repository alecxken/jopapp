<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_token')->nullable();
            $table->string('app_token')->nullable();
            $table->string('total')->nullable();
            $table->string('passed')->nullable();
            $table->string('percentage')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applicant_marks');
    }
}
