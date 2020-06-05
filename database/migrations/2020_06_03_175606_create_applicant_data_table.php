<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantDataTable extends Migration
{
    



      public function up()
    {
        DB::statement("CREATE VIEW applicant_data AS SELECT DISTINCT
a.token,a.title,a.fname,a.lname,a.oname,a.phone_no,a.po_box,a.postal_code,a.dob,a.gender,a.is_disabled,a.current_salary,a.expected_salary,j.signed,CONCAT(a.is_convicted,'-',a.convicted) as is_convicted, CONCAT(a.is_dismissed,'-',a.dismissed) as dismissed,

,
GROUP_CONCAT(DISTINCT  CONCAT(e.institution1,'-',e.cert1,'-',e.year1)  ORDER BY e.year1 ASC SEPARATOR ',') as education, 
GROUP_CONCAT(DISTINCT CONCAT(m.member,'-',m.body) ORDER BY m.body ASC SEPARATOR ',') as membership, 
GROUP_CONCAT(DISTINCT CONCAT(c.institution,'-',c.yearc,'-',.cert) ORDER BY c.cert ASC SEPARATOR ',') as certificates, 
GROUP_CONCAT(DISTINCT CONCAT(em.employer,'-',em.position,' - from ',em.from,' to ',em.to) ORDER BY em.to ASC SEPARATOR ',') as employer,
GROUP_CONCAT(DISTINCT  CONCAT(o.training,'-',o.cert2,'-',o.year2)  ORDER BY o.year2 ASC SEPARATOR ',') as other_training, 
GROUP_CONCAT(DISTINCT  CONCAT(r.ref_name,'-',r.ref_company,'-',r.ref_phone)  ORDER BY r.ref_name ASC SEPARATOR ',') as referees
FROM 
kurra_apps a, jobapps j, kura_education e,kura_memberships m,kura_others o, kura_certs c,kura_employers em,kura_referees r
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
