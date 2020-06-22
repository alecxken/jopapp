<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW experiences AS  SELECT j.app_id,jb.title,concat(fname,' ',lname) as name,min(k.from) as start_date, max(k.to) as end_date, TIMESTAMPDIFF(YEAR,min(k.from),max(k.to)) AS experience FROM kura_employers k
LEFT JOIN kurra_apps a ON a.token = k.token
LEFT JOIN jobapps j ON j.token = k.token
LEFT JOIN jobs jb ON jb.token = j.ref_token
where app_id <> ''
Group By a.token;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW experiences");
    }
}
