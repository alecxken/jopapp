<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantCreteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_creterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_token')->nullable();
            $table->string('app_token')->nullable();
            $table->string('app_id')->nullable();
            $table->string('requirement')->nullable();
            $table->string('passed')->nullable();
            $table->string('comments')->nullable();
            $table->string('token')->nullable();    
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
        Schema::dropIfExists('applicant_creterias');
    }
}
