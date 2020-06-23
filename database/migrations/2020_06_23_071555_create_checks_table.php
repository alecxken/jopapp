<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW checks AS  SELECT ja.app_id,jb.title,concat(fname,' ',lname) as name,requirement,passed as fullfilled,j.comments FROM kura_employers k LEFT JOIN kurra_apps a ON a.token = k.token LEFT JOIN jobapps ja ON a.token = ja.token LEFT JOIN applicant_creterias j ON a.token = j.app_token LEFT JOIN jobs jb ON jb.token = j.job_token where ja.app_id <> '' Group By requirement,ja.app_id;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW checks");
    }
}
