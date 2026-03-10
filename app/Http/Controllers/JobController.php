<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Token;
use Auth;
use App\Job;
use App\Jobapp;
use App\Creteria;
use App\KurraApp;
use App\KuraEducation;
use App\ApplicantData;
use App\ApplicantCreteria;
class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Job::all();
        return view('data.job',compact('data'));
    }

      public function create1()
    {
        $data = Job::all();

         $token = Token::Unique('jobs','token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('AP-'.$token.'-'.$t);
  return view('apply1',compact('token','data'));
     //   return $data;
        return view('backapp.job',compact('data'));
    }

      public function step1()
    {
        $data = Job::all();
     //   return $data;
        return view('steps.job',compact('data'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $token = Token::Unique('jobs','token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('KURA-'.$token.'-'.$t);

        $this->validate($request, [
                                      // 'ref_token' => 'required|unique:data_entries',
                                      //'amount' => 'required:numeric|lt:1000000000',
                                      'title' => 'required',
                                     'qualification' => 'required',
                                      'deadline' => 'required'
                                  ]
                                );
        $job = new Job();
        $job->token = $token;
        $job->title = $request->input('title');
        $job->responsibility = $request->input('responsibility');
        $job->qualification = $request->input('qualification');
        $job->deadline = $request->input('deadline');
        $job->prefix = $request->input('prefix');
        $job->applicants = $request->input('applicants');
        $job->status = 'Active';
        $job->applicants =0;
         $media = $request->file('file');

                          if($request->hasfile('file'))
                          {
                                if (!empty($media)) {
                                    $destinationPath = storage_path('files');
                                    $filename = time().'.'.$media->getClientOriginalExtension();
                                    $media->move($destinationPath, $filename);
                                    $files = $filename;
                                    $job->file = $files;
                                  }

                             }
                             $requires = [];
             foreach ($request->input('name') as $key => $value)
                                 {
                                $requires[] = $request->input('name')[$key];
                               $insert[] =
                                     [
                                      'ref_token' => $token,
                                      'requirement'  => $request->input('name')[$key],
                                      'status'  => 'ok'
                                     ];
                                 }
             $rq = implode('||', $requires);
            $job->requirements = $rq;

        $critic = new Creteria();
        $critic->ref_token = $token;
        $critic->cert_state = $request->input('cert_state');
        $critic->cert_body = $request->input('cert_body');
        $critic->cert_samples = $request->input('cert_samples');
        $critic->memb_state = $request->input('memb_state');
        $critic->memb_body = $request->input('memb_body');
        $critic->memb_samples = $request->input('memb_samples');
        $critic->state_edu = $request->input('state_edu');
        $critic->edu_field = implode(',', $request->input('edu_field'));
        $critic->sample_edu = $request->input('sample_edu');
      //  $critic->status = 'Cheers';
        $critic->save();
        $job->save();
        $critic->save();
        $requires = \DB::table('requireds')->insert($insert);


            return back()->with('status','Successfully Uploaded');
    }

      public function deletejob($request)
        {
          $job = Job::all()->where('token',$request)->first();
          $jobs = Creteria::all()->where('ref_token',$request)->first();
          $j = Job::findorfail($job->id);
          $j->delete();
          $js = Creteria::findorfail($jobs->id);
          $js->delete();

          return back()->with('danger','Success');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


          public function summary_app()
    {
        $data = \DB::table('applicants_views')->get();

        return view('reports.applicants',compact('data'));
    }

                 public function individual_details($id)
    {



          $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')->where('kurra_apps.token',$id)->whereNotNull('jobs.title')
      ->select('kurra_apps.*','app_id','jobs.title','fname','lname')->first();;

      $token = $data->token;
       $education = KuraEducation::all()->where('token',$token);
        $membership = \App\KuraMembership::all()->where('token',$token);
        $certificates = \App\KuraCert::all()->where('token',$token);
        $others = \App\KuraOther::all()->where('token',$token);
        $checklist =ApplicantCreteria::all()->where('app_token',$token);
$employer =\App\KuraEmployer::all()->where('token',$token);
        $referee =\App\KuraReferee::all()->where('token',$token);
  //  return $education;
  //    return $data;



        return view('reports.individual',compact('data','education','membership','certificates','others','employer','checklist','referee'));
    }

              public function job_details($id)
    {
        $data = \DB::table('applicants_views')->get();

        $job = Job::all()->where('title',$id)->first();

          $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')->where('ref_token',$job->token)->whereNotNull('jobs.title')
      ->select('jobapps.token','app_id','jobs.title','fname','lname','app_status','captured_by','jobapps.ref_token')->get();;


       // return $data;

        return view('reports.applicant_details',compact('data'));
    }

    public function jobchecklist()
    {
      $post =Job::all();
      return view('data.reports.myapp',compact('post'));

    }

public function checklist_details(Request $request)
{
    $id = $request->input('post');
    $post = Job::all();

    /*
    |--------------------------------------------------------------------------
    | 1. Get all checklist entries actually filled for this job
    |--------------------------------------------------------------------------
    */
    $listing = \DB::table('applicant_creterias')
        ->where('job_token', $id)
        ->select('id', 'job_token', 'app_token', 'requirement', 'passed')
        ->orderBy('app_token')
        ->orderBy('requirement')
        ->get();

    /*
    |--------------------------------------------------------------------------
    | 2. Build the full requirement list from BOTH:
    |    - applicant_creterias (actual assessed items)
    |    - requireds (template items)
    |--------------------------------------------------------------------------
    */
    $requirementsChecklist = \DB::table('applicant_creterias')
        ->where('job_token', $id)
        ->pluck('requirement')
        ->filter(function ($value) {
            return !is_null($value) && trim($value) !== '';
        })
        ->map(function ($value) {
            return trim($value);
        });

    $requirementsRequireds = \App\Required::where('ref_token', $id)
        ->get()
        ->map(function ($item) {
            if (isset($item->requirement) && trim($item->requirement) !== '') {
                return trim($item->requirement);
            }

            if (isset($item->name) && trim($item->name) !== '') {
                return trim($item->name);
            }

            return null;
        })
        ->filter();

    $allRequirementNames = $requirementsChecklist
        ->merge($requirementsRequireds)
        ->filter()
        ->unique(function ($value) {
            return mb_strtolower(trim($value));
        })
        ->sort()
        ->values();

    // Keep the same structure your Blade already expects: objects with ->requirement
    $job = $allRequirementNames->map(function ($requirement) {
        $obj = new \stdClass();
        $obj->requirement = $requirement;
        return $obj;
    })->values();

    /*
    |--------------------------------------------------------------------------
    | 3. Pull normal applicants from jobapps
    |--------------------------------------------------------------------------
    */
    $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')
        ->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')
        ->leftJoin(
            \DB::raw('
                (
                    SELECT token, employer, position
                    FROM kura_employers
                    WHERE id IN (
                        SELECT MAX(id)
                        FROM kura_employers
                        GROUP BY token
                    )
                ) as latest_employer
            '),
            'latest_employer.token',
            '=',
            'jobapps.token'
        )
        ->where('jobapps.ref_token', $id)
        ->whereNotNull('jobs.title')
        ->select(
            'jobapps.token',
            'jobapps.app_id',
            'jobs.title',
            'kurra_apps.fname',
            'kurra_apps.lname',
            'kurra_apps.oname',
            'kurra_apps.is_disabled',
            'kurra_apps.disability',
            'kurra_apps.dob',
            'kurra_apps.phone_no',
            'kurra_apps.po_box',
            'kurra_apps.postal_code',
            'kurra_apps.email',
            'latest_employer.employer as current_employer',
            'latest_employer.position as current_position',
            'jobapps.app_status',
            'jobapps.captured_by',
            'jobapps.ref_token'
        )
        ->distinct()
        ->get();

    /*
    |--------------------------------------------------------------------------
    | 4. Detect checklist applicants missing from jobapps and add them
    |    so filled checklists do not disappear from the report
    |--------------------------------------------------------------------------
    */
    $jobTitle = \DB::table('jobs')->where('token', $id)->value('title');

    $dataTokens = $data->pluck('token')->filter()->unique();
    $checklistTokens = $listing->pluck('app_token')->filter()->unique();

    $missingChecklistTokens = $checklistTokens->diff($dataTokens)->values();

    if ($missingChecklistTokens->isNotEmpty()) {
        $missingApplicants = \DB::table('kurra_apps')
            ->leftJoin(
                \DB::raw('
                    (
                        SELECT token, employer, position
                        FROM kura_employers
                        WHERE id IN (
                            SELECT MAX(id)
                            FROM kura_employers
                            GROUP BY token
                        )
                    ) as latest_employer
                '),
                'latest_employer.token',
                '=',
                'kurra_apps.token'
            )
            ->whereIn('kurra_apps.token', $missingChecklistTokens)
            ->select(
                'kurra_apps.token',
                'kurra_apps.fname',
                'kurra_apps.lname',
                'kurra_apps.oname',
                'kurra_apps.is_disabled',
                'kurra_apps.disability',
                'kurra_apps.dob',
                'kurra_apps.phone_no',
                'kurra_apps.po_box',
                'kurra_apps.postal_code',
                'kurra_apps.email',
                'latest_employer.employer as current_employer',
                'latest_employer.position as current_position'
            )
            ->get()
            ->map(function ($item) use ($id, $jobTitle) {
                $obj = new \stdClass();
                $obj->token = $item->token;
                $obj->app_id = null;
                $obj->title = $jobTitle;
                $obj->fname = $item->fname;
                $obj->lname = $item->lname;
                $obj->oname = $item->oname;
                $obj->is_disabled = $item->is_disabled;
                $obj->disability = $item->disability;
                $obj->dob = $item->dob;
                $obj->phone_no = $item->phone_no;
                $obj->po_box = $item->po_box;
                $obj->postal_code = $item->postal_code;
                $obj->email = $item->email;
                $obj->current_employer = $item->current_employer;
                $obj->current_position = $item->current_position;
                $obj->app_status = 'Checklist available';
                $obj->captured_by = null;
                $obj->ref_token = $id;
                return $obj;
            });

        $data = $data->concat($missingApplicants)->unique('token')->values();
    }

    /*
    |--------------------------------------------------------------------------
    | 5. Build checklist matrix EXACTLY as Blade expects:
    |    $checklistByApplicant[app_token][requirement] = passed
    |--------------------------------------------------------------------------
    */
    $checklistByApplicant = [];
    $duplicateChecklistRows = [];

    foreach ($listing as $item) {
        $appToken = $item->app_token;
        $rawRequirement = trim((string) $item->requirement);

        if ($rawRequirement === '') {
            continue;
        }

        if (!isset($checklistByApplicant[$appToken])) {
            $checklistByApplicant[$appToken] = [];
        }

        if (array_key_exists($rawRequirement, $checklistByApplicant[$appToken])) {
            $duplicateChecklistRows[] = [
                'app_token' => $appToken,
                'requirement' => $rawRequirement,
                'existing_value' => $checklistByApplicant[$appToken][$rawRequirement],
                'new_value' => $item->passed,
                'row_id' => $item->id ?? null,
            ];
        }

        $checklistByApplicant[$appToken][$rawRequirement] = $item->passed;
    }

    /*
    |--------------------------------------------------------------------------
    | 6. Ensure every applicant has every requirement key
    |    so Blade does not miss cells for some applicants
    |--------------------------------------------------------------------------
    */
    foreach ($data as $applicant) {
        $token = $applicant->token;

        if (!isset($checklistByApplicant[$token])) {
            $checklistByApplicant[$token] = [];
        }

        foreach ($job as $req) {
            if (!array_key_exists($req->requirement, $checklistByApplicant[$token])) {
                $checklistByApplicant[$token][$req->requirement] = null;
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | 7. Optional debug information
    |--------------------------------------------------------------------------
    */
    $debugInfo = [
        'job_token' => $id,
        'requirements_found' => $job->count(),
        'requirements_from_checklist' => $requirementsChecklist->count(),
        'requirements_from_requireds' => $requirementsRequireds->count(),
        'checklist_entries' => $listing->count(),
        'applicants_found' => $data->count(),
        'unique_app_tokens_in_checklist' => $checklistTokens->count(),
        'missing_checklist_tokens_added' => $missingChecklistTokens->values()->all(),
        'missing_checklist_tokens_added_count' => $missingChecklistTokens->count(),
        'duplicate_checklist_rows_count' => count($duplicateChecklistRows),
        'duplicate_checklist_rows' => $duplicateChecklistRows,
        'source' => $listing->isNotEmpty()
            ? 'applicant_creterias + requireds'
            : ($job->isNotEmpty() ? 'requireds_only' : 'none'),
    ];

    return view('data.reports.myapp', compact(
        'data',
        'job',
        'listing',
        'post',
        'checklistByApplicant',
        'debugInfo'
    ));
}
          public function show1()
    {
        $data = Jobapp::all()->where('status','Success');

        $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')->whereNotNull('jobs.title')
      ->select('jobapps.token','app_id','jobs.title','fname','lname','app_status','captured_by','jobapps.ref_token')->get();;

      // return $data;


        return view('data.applicants',compact('data'));
    }

       public function showapps()
    {
        $data = Jobapp::all()->where('status','Success');

        $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')->where('jobapps.status','Success')->whereNotNull('jobs.title')
      ->select('jobs.token','app_id','jobs.title','fname','lname','app_status','captured_by')->get();;


      // return $job;
       // return $data;
        return view('data.allapps',compact('data'));
    }

    public function showpersons()
    {
        // $data = KurraApp::all();
           $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')->leftJoin('applicant_marks', 'applicant_marks.job_token', '=', 'jobapps.token')->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')->where('jobapps.status','Success')->whereNotNull('jobs.title')
      ->select('kurra_apps.*','total','passed','percentage','app_id','jobs.title','captured_by')->get();;

     // return $data;

        return view('data.persons',compact('data'));
    }

     public function showperson($job)
    {
        $data = Jobapp::all()->where('status','Success');
        return view('data.persons',compact('data'));
    }



    public function show()
    {
        $data = Jobapp::all()->where('app_id',\Auth::id())
                                          ->where('app_email',\Auth::user()->email)
                                          ->where('status','Success');
        // return $data;

        return view('data.my',compact('data'));
    }




public function stage($ref,$token)
{
    $id = $ref;
        $req = \App\Required::all()->where('ref_token',$id);
         $check = Jobapp::all()->where('ref_token',$id)
                                          ->where('token',$token)
                                          ->first();
                    $check1 = Jobapp::all()->where('ref_token',$id)
                                          ->where('token',$token)
                                          ->where('app_status','Stage2')
                                          ->first();
                    $check2 = Jobapp::all()->where('ref_token',$id)
                                          ->where('token',$token)
                                           ->where('app_status','Stage3')
                                          ->first();


         if (!empty($check2) ){
             $token = $check->token;
            return view('backapp.attach',compact('token'));
        }
        if (!empty($check1) ){
             $token = $check->token;
            return view('backapp.employee',compact('token','req'));
        }

        if (!empty($check)) {
         $exist = KurraApp::all()->where('token',$check->token)->first();

        if (!empty($exist)) {
            $token = $check->token;
            return view('backapp.cert',compact('token','req'));
        }
        else
        {
            return back()->with('danger','not found');
        }
    }
      else
        {
            return back()->with('danger','not found');
        }
}

    public function applynow($id)
    {

                    $token = Token::Unique('jobs','token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('AP-'.$token.'-'.$t);
                    $check = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                          ->first();
                    $check1 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                          ->where('app_status','Stage2')
                                          ->first();
                    $check2 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                           ->where('app_status','Stage3')
                                          ->first();

                      $email=\Auth::user()->email;
         if (!empty($check2) ){
             $token = $check->token;
            return view('apps.attach',compact('token'));
        }
        if (!empty($check1) ){
             $token = $check->token;
            return view('apps.employee',compact('token','req'));
        }

        if (!empty($check)) {
         $exist = KurraApp::all()->where('token',$check->token)->first();

        if (!empty($exist)) {
            $token = $check->token;
            return view('apps.cert',compact('token'));
        }
        $data =  Jobapp::findorfail($check->id);
        $data->ref_token = $id;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
        $data->app_email = \Auth::user()->email;
        $data->app_id = \Auth::id();
        $data->status ='Success';
        $data->save();

        }
        else
        {
        $data = new Jobapp();
        $data->token = $token;
        $data->ref_token = $id;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
        $data->app_email = \Auth::user()->email;
        $data->app_id = \Auth::id();
        $data->status ='Success';
        $data->save();
        }

        $email=\Auth::user()->email;

        return view('apply',compact('token','email'));
    }

    public function applyjobnow($id)
    {
                    $token = Token::Unique('jobs','token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('AP-'.$token.'-'.$t);

                    $job_id = $id;
                    return view('apply1',compact('token','job_id'));

    }


      public function applynow1($id)
    {

                    $token = Token::Unique('jobs','token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('AP-'.$token.'-'.$t);
                    $check = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                          ->first();
                    $req = Required::all()->where('ref_token',$id);

                                          //return $check;
                    $check1 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                          ->where('app_status','Stage2')
                                          ->first();
                    $check2 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                           ->where('app_status','Stage3')
                                          ->first();

                      $email=\Auth::user()->email;
         if (!empty($check2) ){
             $token = $check->token;
            return view('backapp.attach',compact('token'));
        }
        if (!empty($check1) ){
             $token = $check->token;
            return view('backapp.employee',compact('token','req'));
        }

        if (!empty($check)) {
         $exist = KurraApp::all()->where('token',$check->token)->first();

        if (!empty($exist)) {
            $token = $check->token;
            return view('backapp.cert',compact('token'));
        }
        $data =  Jobapp::findorfail($check->id);
        $data->ref_token = $id;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
        $data->app_email = \Auth::user()->email;
        $data->app_id = \Auth::id();
        $data->status ='Success';
        $data->save();

        }
        else
        {
        $data = new Jobapp();
        $data->token = $token;
        $data->ref_token = $id;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
        $data->app_email = \Auth::user()->email;
        $data->app_id = \Auth::id();
        $data->status ='Success';
        $data->save();
        }

        $email=\Auth::user()->email;

        return view('apply1',compact('token','email'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function dropapp($id)
    {
        $user = Jobapp::all()->where('token',$id)->first();
        $kura = KurraApp::all()->where('token',$id)->first();
        $jobapp = Jobapp::findorfail($user->id);
        $jobapp->delete();
        $kura = KurraApp::findorfail($kura->id);
        $kura->delete();

        return back()->with('danger','Successfully Dropped The Application');
    }

      public function viewapp($id)
    {
        $user = Jobapp::all()->where('id',$id)->first();
        $kura = KurraApp::all()->where('id',$id)->first();


        return $kura;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
            $applicant = new KurraApp();
            $applicant->token = $request->input('token');
            $applicant->fname = $request->input('fname');
            $applicant->lname = $request->input('lname');
            $applicant->oname = $request->input('oname');
            $applicant->po_box = $request->input('po_box');
            $applicant->postal_code = $request->input('postal_code');
            $applicant->phone_no = $request->input('phone_no');
            $applicant->email = $request->input('email');
            $applicant->dob = $request->input('dob');
            $applicant->gender = $request->input('gender');
            $applicant->passport = $request->input('passport');
            $applicant->county = $request->input('county');
            $applicant->district = $request->input('district');
            $applicant->is_disabled = $request->input('is_disabled');
            $applicant->disability = $request->input('disability');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    #Step One

    public function step_one($token)
    {


         $emp = KurraApp::all()->where('token',$token)->first();

         $job = Jobapp::all()->where('token',$token)->first();

       return view('steps.person',compact('emp','job'));
    }

    #step-two

        public function step_two($token)
    {


        $education = KuraEducation::all()->where('token',$token);
        $membership = \App\KuraMembership::all()->where('token',$token);
        $certificates = \App\KuraCert::all()->where('token',$token);
        $others = \App\KuraOther::all()->where('token',$token);
        $token = $token;


       return view('steps.education',compact('education','token','education','membership','certificates','others'));
    }

          public function step_three($token)
    {

      $job = \App\Jobapp::all()->where('token',$token)->first();
      //return $job;
      $req =[];
        $checklist =ApplicantCreteria::all()->where('app_token',$token);
        if ($checklist->isEmpty()) {
          # code...

          $req = \App\Required::all()->where('ref_token',$job->ref_token);

         //  return $checklist;
        }

        $employer =\App\KuraEmployer::all()->where('token',$token);
        $referee =\App\KuraReferee::all()->where('token',$token);
      //return $checklist;

        $education = KuraEducation::all()->where('token',$token);
        $membership = \App\KuraMembership::all()->where('token',$token);
        $certificates = \App\KuraCert::all()->where('token',$token);
        $others = \App\KuraOther::all()->where('token',$token);
        $token = $token;


       return view('steps.emp',compact('checklist','token','referee','employer','certificates','others','req'));
    }



   public function drop_referee($token)
    {
        $education = \App\KuraReferee::findorfail($token);
        $education->delete();
        return back()->with('danger','Successfully Dropped');
    }

       public function drop_employer($token)
    {
        $education = \App\KuraEmployer::findorfail($token);
        $education->delete();
        return back()->with('danger','Successfully Dropped');
    }


     public function drop_education($token)
    {
        $education = KuraEducation::findorfail($token);
        $education->delete();
        return back()->with('danger','Successfully Dropped');
    }

         public function drop_certs($token)
    {
        $education = \App\KuraCert::findorfail($token);
        $education->delete();
        return back()->with('danger','Successfully Dropped');
    }


     public function drop_membership($token)
    {
        $education = \App\KuraMembership::findorfail($token);
        $education->delete();
        return back()->with('danger','Successfully Dropped');
    }

       public function drop_others($token)
    {
        $education = \App\KuraOther::findorfail($token);
        $education->delete();
        return back()->with('danger','Successfully Dropped');
    }

    public function drop_applicant($token)
    {
      $jobapp = Jobapp::all()->where('token',$token)->first();
      if (!empty($jobapp))
      {
        $jj = Jobapp::findorfail($jobapp->id);
        $jj->delete();
      }
      $jobs = KurraApp::all()->where('token',$token)->first();
       if (!empty($jobs))
      {
        $jj = KurraApp::findorfail($jobs->id);
        $jj->delete();
      }
      $kura_ed = \App\KuraEducation::all()->where('token',$token)->first();
       if (!empty($kura_ed))
      {
        $jj = KuraEducation::findorfail($kura_ed->id);
        $jj->delete();
      }
      $certs = \App\KuraCert::all()->where('token',$token)->first();
       if (!empty($certs))
      {
        $jj = \App\KuraCert::findorfail($certs->id);
        $jj->delete();
      }
      $members = \App\KuraMembership::all()->where('token',$token)->first();
       if (!empty($members))
      {
        $jj = \App\KuraMembership::findorfail($members->id);
        $jj->delete();
      }
      $other = \App\KuraOther::all()->where('token',$token)->first();
       if (!empty($other))
      {
        $jj = \App\KuraOther::findorfail($other->id);
        $jj->delete();
      }
      $referee = \App\KuraReferee::all()->where('token',$token)->first();
       if (!empty($referee))
      {
        $jj = \App\KuraReferee::findorfail($referee->id);
        $jj->delete();
      }
      $empls = \App\KuraEmployer::all()->where('token',$token)->first();
       if (!empty($empls))
      {
        $jj = \App\KuraEmployer::findorfail($empls->id);
        $jj->delete();
      }
      $marks = \App\ApplicantMark::all()->where('job_token',$token)->first();
       if (!empty($marks))
      {
        $jj = \App\ApplicantMark::findorfail($marks->id);
        $jj->delete();
      }
      $creteria = \App\ApplicantCreteria::all()->where('job_token',$token)->first();
       if (!empty($creteria))
      {
        $jj =  \App\ApplicantCreteria::findorfail($creteria->id);
        $jj->delete();
      }

      return back()->with('error','Dropped Successfully');
    }


        // if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
        //    if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
        //    if(!empty($insert2)){\DB::table('kura_memberships')->insert($insert2);}
        //    if(!empty($insert3)){\DB::table('kura_others')->insert($insert3);}

}
