<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsViewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        \DB::statement("CREATE VIEW applicants_views AS
                       SELECT a.title , COUNT(b.token) as num FROM jobs as a
                        LEFT JOIN jobapps as b
                        on  b.ref_token = a.token
                        GROUP BY a.title");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW applicants_views");
    }
}
