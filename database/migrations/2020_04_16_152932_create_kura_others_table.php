<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuraOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kura_others', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token');
            $table->text('training')->nullable();
            $table->text('cert2')->nullable();
            $table->text('institution2')->nullable();
            $table->text('year2')->nullable();
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
        Schema::dropIfExists('kura_others');
    }
}
