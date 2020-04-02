<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->nullabe();
            $table->string('title')->nullabe();
            $table->text('responsibility')->nullabe();
            $table->longText('requirements')->nullabe();
            $table->longText('qualification')->nullabe();
            $table->string('file')->nullabe();
            $table->string('deadline')->nullabe();
            $table->string('applicants')->nullabe();
            $table->string('status')->nullabe();
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
        Schema::dropIfExists('jobs');
    }
}
