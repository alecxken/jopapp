<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_token')->nullabe();
            $table->string('cert_state')->nullabe();
            $table->text('cert_body')->nullabe(); 
            $table->text('cert_samples')->nullabe(); 
            $table->text('memb_state')->nullabe();  
            $table->text('memb_body')->nullabe();
            $table->text('memb_samples')->nullabe();  
            $table->text('state_edu')->nullabe();
            $table->text('edu_field')->nullabe();  
            $table->text('sample_edu')->nullabe();
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
        Schema::dropIfExists('creterias');
    }
}
