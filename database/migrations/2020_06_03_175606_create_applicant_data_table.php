<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantDataTable extends Migration
{
    



      public function up()
    {
        DB::statement("CREATE VIEW applicant_data AS SELECT DISTINCT
a.token,j.app_id,a.title,a.fname,a.lname,a.oname,a.email,a.phone_no,a.po_box,a.postal_code,a.dob,a.gender,a.is_disabled,a.current_salary,a.expected_salary,j.signed,CONCAT(a.is_convicted,'-',a.convicted) as convicted, CONCAT(a.is_dismissed,'-',a.dismissed) as dismissed,

GROUP_CONCAT(DISTINCT  CONCAT(e.institution1,'-',e.cert1,'-',e.year1)  ORDER BY e.token ASC SEPARATOR ',') as education, 
GROUP_CONCAT(DISTINCT CONCAT(m.member,'-',m.body) ORDER BY m.token ASC SEPARATOR ',') as membership, 
GROUP_CONCAT(DISTINCT CONCAT(c.institution,'-',c.year,'-',c.cert) ORDER BY c.token ASC SEPARATOR ',') as certificates, 
GROUP_CONCAT(DISTINCT CONCAT(em.employer,'-',em.position,' - from ',em.from,' to ',em.to) ORDER BY em.token ASC SEPARATOR ',') as employer,
GROUP_CONCAT(DISTINCT  CONCAT(o.training,'-',o.cert2,'-',o.year2)  ORDER BY o.token ASC SEPARATOR ',') as other_training, 
GROUP_CONCAT(DISTINCT  CONCAT(r.ref_name,'-',r.ref_company,'-',r.ref_phone)  ORDER BY r.token ASC SEPARATOR ',') as referees
FROM 
jobapps j
LEFT JOIN kurra_apps a
    ON a.token = j.token
LEFT JOIN kura_education e
    ON a.token = e.token
LEFT JOIN kura_memberships m
    ON a.token = m.token
LEFT JOIN kura_certs c
    ON a.token = c.token
LEFT JOIN kura_others o
    ON a.token = o.token

LEFT JOIN kura_employers em
    ON a.token = em.token
LEFT JOIN kura_referees r
    ON a.token = r.token
 GROUP BY j.token;");
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
