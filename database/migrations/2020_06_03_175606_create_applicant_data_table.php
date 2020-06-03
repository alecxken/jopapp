<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantDataTable extends Migration
{
    



      public function up()
    {
        DB::statement("CREATE VIEW applicant_data AS SELECT DISTINCT
a.token,a.title,a.fname,a.lname,a.oname,a.phone_no,a.po_box,a.postal_code,a.dob,a.gender,a.is_disabled,a.current_salary,a.expected_salary,j.signed,
GROUP_CONCAT(e.cert1 ORDER BY e.year1 ASC SEPARATOR ',') as education, 
GROUP_CONCAT(m.body ORDER BY m.body ASC SEPARATOR ',') as membership, 
GROUP_CONCAT(c.cert ORDER BY c.cert ASC SEPARATOR ',') as certificates, 
GROUP_CONCAT(em.employer ORDER BY em.to ASC SEPARATOR ',') as employer,
GROUP_CONCAT(r.ref_name ORDER BY r.ref_name ASC SEPARATOR ',') as userrating
FROM 
kurra_apps a, jobapps j, kura_education e,kura_memberships m, kura_certs c,kura_employers em,kura_referees r
WHERE 
a.token = j.token AND
a.token = e.token AND
a.token = m.token AND
a.token = c.token AND
a.token = em.token AND
a.token = r.token
GROUP BY a.token,a.title,a.fname,a.lname,a.oname,a.phone_no,a.po_box,a.postal_code,a.dob,a.gender,a.is_disabled,a.current_salary,a.expected_salary,j.signed;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW applicant_data");
    }
}
