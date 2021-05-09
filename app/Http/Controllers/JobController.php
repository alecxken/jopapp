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
class JobController extends Controller
{
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
    

          public function mapps1()
    {
        $data = Jobapp::all()->where('status','Success');

        $data = Jobapp::leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')->leftJoin('kurra_apps', 'kurra_apps.token', '=', 'jobapps.token')->whereNotNull('jobs.title')
      ->select('jobapps.token','app_id','jobs.title','fname','lname','app_status','captured_by','jobapps.ref_token')->get();;
        return view('data.applicants',compact('data'));
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
        $data = KurraApp::all();
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


        // if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
        //    if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
        //    if(!empty($insert2)){\DB::table('kura_memberships')->insert($insert2);}
        //    if(!empty($insert3)){\DB::table('kura_others')->insert($insert3);}

}
