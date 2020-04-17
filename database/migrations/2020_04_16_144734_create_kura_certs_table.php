<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuraCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kura_certs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token')->nullable();
            $table->text('cert')->nullable();
            $table->text('institution')->nullable();
            $table->text('year')->nullable();
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
        Schema::dropIfExists('kura_certs');
    }
}
