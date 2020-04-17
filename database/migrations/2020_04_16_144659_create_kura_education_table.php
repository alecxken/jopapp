<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuraEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kura_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token');
            $table->text('edu')->nullable();
            $table->text('cert1')->nullable();
            $table->text('institution1')->nullable();
            $table->text('year1')->nullable();
            $table->text('marks')->nullable();
            $table->text('pass')->nullable();
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
        Schema::dropIfExists('kura_education');
    }
}
