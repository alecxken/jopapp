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
            $table->string('token')->nullabe();
            $table->string('ref_token')->nullabe();
            $table->string('app_date')->nullabe();
            $table->string('app_status')->nullabe();
            $table->string('app_email')->nullabe();
            $table->string('app_id')->nullabe();  
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
        Schema::dropIfExists('jobapps');
    }
}
