<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuraMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kura_memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->text('token')->nullable();
            $table->text('member')->nullable();
            $table->text('body')->nullable();
            $table->text('membno')->nullable();
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
        Schema::dropIfExists('kura_memberships');
    }
}
