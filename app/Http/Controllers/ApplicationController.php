<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KurraApp;
use App\Jobapp;
use App\Job;
use Auth;
use App\KuraAttachment;
USE App\ApplicantData;
use App\Experience;
use App\Checks;
use Rap2hpoutre\FastExcel\FastExcel;
class ApplicationController extends Controller
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
    public function report()
    {
        $data = ApplicantData::all();
        return $data;
       $name = 'KURA-APPLICANTS-REPORT-'.\Carbon\Carbon::now()->format('d-M-Y').'.xlsx';
      //$file = (new FastExcel($data))->down(storage_path('files/'.$name));
       return (new FastExcel($data))->download('KURA-APPLICANTS-REPORT-'.\Carbon\Carbon::now()->format('d-M-Y').'.xlsx');
       //return $file;
       return back()->with('status','succesfully');
    }



    public function checklist()
    {
        
      $data = Checks::all();
       return view('data.checklist',compact('data'));
    }
    public function experience()
    {
        
      $data = Experience::all();
       return view('data.experience',compact('data'));
    }
    public function reportsall()
    {
        
      $datas = ApplicantData::all();
       return view('backapp.viewapplicant',compact('datas'));
    }

     public function reportpost(Request $request )
    {
        
      $datas = ApplicantData::all();
       return view('backapp.viewapplicant',compact('datas'));
    }

     public function reportspecific($id)
    {
        
      $datas = ApplicantData::all();
       return view('backapp.viewapplicant',compact('datas'));
    }

    



      public function cert1(Request $request)
    {

      // $email = $request->input('email');
      $email = $request->input('email');
      $id =  $request->input('job_id');
        $job = Job::all()->where('token',$id)->first();
         $req = \App\Required::all()->where('ref_token',$id);
           $app = Jobapp::all()->where('ref_token',$id)->count() +1;
                    // $token = Token::Unique('jobs','token',5);
                    // $t = date("Y-M",strtotime("now"));
                    $token = $request->input('token');; 
                    $check = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',$email)
                                          ->first();

                                          //return $check;
                    $check1 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',$email)
                                          ->where('app_status','Stage2')
                                          ->first();
                    $check2 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',$email)
                                           ->where('app_status','Stage3')
                                          ->first();

                     $check3 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',$email)
                                           ->where('app_status','Complete')
                                          ->first();
                      
                  //    dd($check3);
         if (!empty($check3) ){
             
            return redirect('jobs-apps')->with('danger','Applicant Already Completed Application');
        }
                     
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

        $data =  Jobapp::findorfail($check->id);
        $data->ref_token = $id;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
         $data->app_id = $request->input('app_id');
        $data->app_email = $email;
        $data->captured_by = Auth::id();
        $data->status ='Success';
        $data->save();
      
        $this->validate($request, [
                                       'token' => 'required|unique:kurra_apps',
                                      'phone_no' => 'required:numeric',
                                      'title' => 'required',
                                      'fname' => 'required',
                                      'lname' => 'required'
                                  ]
                                ); 
        $person = new KurraApp();
        $person->token = $request->input('token');
        $person->title = $request->input('title');
        $person->fname = $request->input('fname');
        $person->lname = $request->input('lname');
        $person->oname = $request->input('oname');
        $person->po_box = $request->input('po_box');
        $person->postal_code = $request->input('postal_code');
        $person->phone_no = $request->input('phone_no');
        $person->email = $request->input('email');
        $person->dob = $request->input('dob');
        $person->gender = $request->input('gender');
        $person->passport = $request->input('passport');
        $person->county = $request->input('county');
        $person->district = $request->input('district');
        $person->is_disabled = $request->input('is_disabled');
        $person->disability = $request->input('disability');
        $person->current_salary = $request->input('current_salary');
        $person->expected_salary = $request->input('expected_salary');
        $person->is_convicted = $request->input('is_convicted');
        $person->convicted = $request->input('convicted');
         $person->is_dismissed = $request->input('is_dismissed');
        $person->dismissed = $request->input('dismissed');
        $person->save();

      return view('backapp.cert',compact('token','req','id'));  //

        }
        else
        {
           $exist = KurraApp::all()->where('token',$request->input('token'))->first();
        if (!empty($exist)) {
          
            return view('backapp.cert',compact('token','req'));
        }
        $data = new Jobapp();
        $data->token = $token;
        $data->ref_token = $id;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
        $data->app_email = $email;
         $data->captured_by = Auth::id();
        $data->app_id =   $request->input('app_id');
        $data->status ='Success';
        $data->save();

          $this->validate($request, [
                                       'token' => 'required|unique:kurra_apps',
                                      'phone_no' => 'required:numeric',
                                      'title' => 'required',
                                      'fname' => 'required',
                                      'lname' => 'required'
                                  ]
                                ); 
        $person = new KurraApp();
        $person->token = $request->input('token');
        $person->title = $request->input('title');
        $person->fname = $request->input('fname');
        $person->lname = $request->input('lname');
        $person->oname = $request->input('oname');
        $person->po_box = $request->input('po_box');
        $person->postal_code = $request->input('postal_code');
        $person->phone_no = $request->input('phone_no');
        $person->email = $request->input('email');
        $person->dob = $request->input('dob');
        $person->gender = $request->input('gender');
        $person->passport = $request->input('passport');
        $person->county = $request->input('county');
        $person->district = $request->input('district');
        $person->is_disabled = $request->input('is_disabled');
        $person->disability = $request->input('disability');
             $person->current_salary = $request->input('current_salary');
        $person->expected_salary = $request->input('expected_salary');
        $person->is_convicted = $request->input('is_convicted');
        $person->convicted = $request->input('convicted');
         $person->is_dismissed = $request->input('is_dismissed');
        $person->dismissed = $request->input('dismissed');
        $person->save();

      return view('backapp.cert',compact('token','req','id'));  //
        }
       
        

     
       
        

       
    }
    public function cert(Request $request)
    {
        $token =$request->input('token');
        $exist = KurraApp::all()->where('token',$request->input('token'))->first();
        if (!empty($exist)) {

            return view('apps.cert',compact('token'));
        }
          $this->validate($request, [
                                       'token' => 'required|unique:kurra_apps',
                                      'phone_no' => 'required:numeric',
                                      'title' => 'required',
                                      'fname' => 'required',
                                      'lname' => 'required'
                                  ]
                                ); 
        $person = new KurraApp();
        $person->token = $request->input('token');
        $person->title = $request->input('title');
        $person->fname = $request->input('fname');
        $person->lname = $request->input('lname');
        $person->oname = $request->input('oname');
        $person->po_box = $request->input('po_box');
        $person->postal_code = $request->input('postal_code');
        $person->phone_no = $request->input('phone_no');
        $person->email = $request->input('email');
        $person->dob = $request->input('dob');
        $person->gender = $request->input('gender');
        $person->passport = $request->input('passport');
        $person->county = $request->input('county');
        $person->district = $request->input('district');
        $person->is_disabled = $request->input('is_disabled');
        $person->disability = $request->input('disability');
        $person->current_salary = $request->input('current_salary');
        $person->expected_salary = $request->input('expected_salary');
        $person->is_convicted = $request->input('is_convicted');
        $person->convicted = $request->input('convicted');
         $person->is_dismissed = $request->input('is_dismissed');
        $person->dismissed = $request->input('dismissed');
        $person->save();

      return view('apps.cert',compact('token'));  //
    }

    public function education(Request $request)
    {
       


       return view('apps.education'); //
    }

    public function membership()
    {
       return view('apps.membership'); //
    }

   public function other()
    {
       return view('apps.other'); //
    }

   public function employee(Request $request)
    {
        
             $token = $request->input('token');
             foreach ($request->input('edu') as $key => $value)
                     {
                        
                         $emptys = $request->input('edu')[$key];
                        if(is_null($emptys))
                        {
                            $insert = [];
                        }
                         else
                         {                    
                        $insert[] =
                                     [
                                      'token' => $token,    
                                      'edu'  => $request->input('edu')[$key],                                  
                                      'cert1'  => $request->input('cert')[$key],
                                      'institution1'  => $request->input('institution')[$key],
                                      'year1'  => $request->input('year')[$key],
                                      ];
                         }
                    }
                     foreach ($request->input('cert1') as $key => $value)
                     {
                        $empty1 = $request->input('cert')[$key];
                        if(is_null($empty1))
                        {
                            $insert1 = [];
                        }
                         else
                         {
                                             
                        $insert1[] =
                                     [
                                      'token' => $token,       
                                      'cert'  => $request->input('cert1')[$key],
                                      'institution'  => $request->input('institution1')[$key],
                                      'year'  => $request->input('year1')[$key],                             
                                     ];
                            }
                     }
                     foreach ($request->input('member') as $key => $value)
                     {
                        $empty2 = $request->input('member')[$key];
                        if(is_null($empty2))
                        {
                            $insert2 = [];
                        }
                         else
                         {
                                             
                            $insert2[] =
                                     [
                                      'token' => $token,       
                                      'member'  => $request->input('member')[$key],
                                      'body'  => $request->input('body')[$key],
                                      'membno'  => $request->input('membno')[$key],                             
                                     ];
                         }
                     }
                         foreach ($request->input('training') as $key => $value)
                     {
                        $empty = $request->input('training')[$key];
                        if(is_null($empty))
                        {
                            $insert3 = [];
                        }
                         else
                         {
                              $insert3[] =
                                     [
                                      'token' => $token,  
                                       'training'  => $request->input('training')[$key],     
                                      'cert2'  => $request->input('cert2')[$key],
                                      'institution2'  => $request->input('institution2')[$key],
                                      'year2'  => $request->input('year2')[$key], 
                      
                                     ];                      # code...
                         }                    
                     
                     }

                    
        
           if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
           if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
           if(!empty($insert2)){\DB::table('kura_memberships')->insert($insert2);}
           if(!empty($insert3)){\DB::table('kura_others')->insert($insert3);}
           $app = Jobapp::all()->where('token',$token)->first();
            $req = \App\Required::all()->where('ref_token',$id);
           if (!empty($app)) 
            {
                $apps = Jobapp::findorfail($app->id);
                $apps->app_status = 'Stage2';
                $apps->save();
            }
       return view('apps.employee',compact('token','req')); //
    }


     public function employee1(Request $request)
    {
        
             $token = $request->input('token');
             $cert1 = array_filter($request->input('cert1'));
             $member = array_filter($request->input('member')); 
             $training = array_filter($request->input('training'));
             $id = Jobapp::all()->where('token',$token)->first();
            // return $id;

              $req = \App\Required::all()->where('ref_token',$id->ref_token);
          //   $chk4 = array_filter($request->input('checklist'));

         
                      
            if(!empty($request->input('edu')))
                 {
             foreach ($request->input('edu') as $key => $value)
                     {
                        
                         $emptys = $request->input('edu')[$key];
                        if(is_null($emptys))
                        {
                            $insert = [];
                        }
                         else
                         {  
                        $updateedu = \App\KuraEducation::where('token', $token)  
                                                        ->where('edu',$request->input('edu')[$key]) 
                                                        ->where('cert1',$request->input('cert')[$key])
                                                        ->first();
                        if (!empty($updateedu)) 
                          {
                             $upd = \App\KuraEducation::findorfail($updateedu->id);
                              $upd->edu = $request->input('edu')[$key];
                              $upd->cert1 = $request->input('cert')[$key];
                              $upd->institution1 = $request->input('institution')[$key];
                              $upd->year1 = $request->input('year')[$key];
                              $upd->save();                        
                          }    

                          else
                          {
                            $insert[] =
                                     [
                                      'token' => $token,    
                                      'edu'  => $request->input('edu')[$key],                                  
                                      'cert1'  => $request->input('cert')[$key],
                                      'institution1'  => $request->input('institution')[$key],
                                      'year1'  => $request->input('year')[$key],
                                      ];
                          }                
                        
                         }
                    }
                  }

                    if(!empty($request->input('cert1')))
                    {
                     foreach ($request->input('cert1') as $key => $value)
                     {
                        $empty1 = $request->input('cert1')[$key];
                        if(is_null($empty1))
                        {
                            $insert1 = [];
                        }
                         else
                         {
                            $updatecert = \App\KuraCert::where('token', $token)  
                                                        ->where('cert',$request->input('cert1')[$key]) 
                                                        ->where('institution',$request->input('institution1')[$key])
                                                        ->first();
                        if (!empty($updatecert)) 
                          {
                             $upd = \App\KuraCert::findorfail($updatecert->id);
                              $upd->cert = $request->input('cert1')[$key];
                              $upd->institution = $request->input('institution1')[$key];
                              $upd->reg_no = $request->input('reg_no')[$key];
                              $upd->year = $request->input('year1')[$key];
                              $upd->save();                        
                          }    

                          else
                          {
                                             
                              $insert1[] =
                                     [
                                      'token' => $token,       
                                      'cert'  => $request->input('cert1')[$key],
                                      'institution'  => $request->input('institution1')[$key],
                                       'reg_no'  => $request->input('reg_no')[$key],
                                      'year'  => $request->input('year1')[$key],                             
                                     ];
                            }
                          }
                     }
                   }
                       if(!empty($request->input('member')))
                       {
                     foreach ($request->input('member') as $key => $value)
                     {
                        $empty2 = $request->input('member')[$key];
                        if(is_null($empty2))
                        {
                            $insert2 = [];
                        }
                         else
                         {
                             $updatemember = \App\KuraMembership::where('token', $token)  
                                                        ->where('member',$request->input('member')[$key]) 
                                                        ->where('body',$request->input('body')[$key])
                                                        ->first();
                        if (!empty($updatemember)) 
                          {
                              $upd = \App\KuraMembership::findorfail($updatemember->id);
                              $upd->member = $request->input('member')[$key];
                              $upd->body = $request->input('body')[$key];
                              $upd->save();                        
                          }
                          else
                          {
                               $insert2[] =
                                     [
                                      'token' => $token,       
                                      'member'  => $request->input('member')[$key],
                                      'body'  => $request->input('body')[$key],
                                      'membno'  => $request->input('membno')[$key],                             
                                     ];
                          }    
                                             
                         
                         }
                     }
                   }
                 if(!empty($request->input('training')))
                 {
                         foreach ($request->input('training') as $key => $value)
                     {
                        $empty = $request->input('training')[$key];
                        if(is_null($empty))
                        {
                            $insert3 = [];
                        }
                         else
                         {
                            $updateother = \App\KuraOther::where('token', $token)  
                                                        ->where('training',$request->input('training')[$key]) 
                                                        ->where('cert2',$request->input('cert2')[$key])
                                                              ->first();
                              if (!empty($updateother)) 
                                {
                                    $upd = \App\KuraOther::findorfail($updateother->id);
                                    $upd->training = $request->input('training')[$key];
                                    $upd->cert2 = $request->input('cert2')[$key];
                                    $upd->institution2 = $request->input('institution2')[$key];
                                    $upd->year2 = $request->input('year2')[$key];
                                    $upd->save();                        
                                }
                                else
                                {
                                    $insert3[] =
                                           [
                                            'token' => $token,  
                                             'training'  => $request->input('training')[$key],     
                                            'cert2'  => $request->input('cert2')[$key],
                                            'institution2'  => $request->input('institution2')[$key],
                                            'year2'  => $request->input('year2')[$key], 
                            
                                           ];                      # code...
                                }                          
                          }                    
                     
                     }
                   }

                    
        
           if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
           if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
           if(!empty($insert2)){\DB::table('kura_memberships')->insert($insert2);}
           if(!empty($insert3)){\DB::table('kura_others')->insert($insert3);}
      
           $app = Jobapp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = Jobapp::findorfail($app->id);
                $apps->app_status = 'Stage2';
                $apps->save();
            }
       return view('backapp.employee',compact('token','req')); //
    }

     public function deleteall($id)
    {
      if ($id == 'EKE') {
       \DB::table('jobapps')->truncate();
          \DB::table('kurra_apps')->truncate();
          \DB::table('kura_education')->truncate();
           \DB::table('kura_certs')->truncate();
           \DB::table('kura_memberships')->truncate();
           \DB::table('kura_others')->truncate();
           \DB::table('applicant_creterias')->truncate();
        return back()->with('danger','Successfully Done');
      }
      else
      {
            return back()->with('danger','Successfully Done');
      }
        
    }


   public function referee(Request $request)
    {
       $token = $request->input('token');
               foreach ($request->input('ref_name') as $key => $value)
                     {
                        $empty2 = $request->input('ref_name')[$key];
                        if(is_null($empty2))
                        {
                            $insert2 = [];
                        }
                         else
                         {
                                             
                            $insert2[] =
                                     [
                                      'ref_name'=>$request->input('ref_name')[$key],
                                      'ref_company' =>$request->input('ref_company')[$key],
                                      'ref_position'=>$request->input('ref_position')[$key],
                                      'ref_email'=>$request->input('ref_email')[$key],
                                      'ref_phone'=>$request->input('ref_phone')[$key],
                                      'token' => $token,                              
                                     ];
                         }
                     }
                         foreach ($request->input('employer') as $key => $value)
                     {
                        $empty = $request->input('employer')[$key];
                        if(is_null($empty))
                        {
                            $insert3 = [];
                        }
                         else
                         {
                              $insert3[] =
                                     [
                                      'token' => $token,  
                                       'employer'  => $request->input('employer')[$key],     
                                      'position'  => $request->input('position')[$key],
                                      'from'  => $request->input('from')[$key],
                                      'to'  => $request->input('to')[$key],
                                       'contact_person' => $request->input('contact_person')[$key],
                      
                                     ];                      # code...
                         }                    
                     
                     }

                    
        
           // if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
           // if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
           if(!empty($insert2)){\DB::table('kura_referees')->insert($insert2);}
           if(!empty($insert3)){\DB::table('kura_employers')->insert($insert3);}
           $app = Jobapp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = Jobapp::findorfail($app->id);
                $apps->app_status = 'Stage3';
                $apps->save();
            }
       return view('apps.attach',compact('token')); //
    }

      public function referee1(Request $request)
    {
       $token = $request->input('token');
       $signed  =$request->input('signed');
       $total =0;
       $percentage = 0;
       $pass =0;

       if (!empty($request->input('passed'))) {
          $v  =  array_count_values($request->input('passed'));
              if (empty($v['Yes'])) {
                $pass = 0;
              }
              else {
                $pass = $v['Yes'];
              }

               if (empty($v['No'])) {
                $fail = 0;
              }
              else {
                $fail = $v['No'];
              }
          
              $total = $pass + $fail;
              $percentage = round(($pass*100)/$total);

       }
             

               if(!empty($request->input('ref_name')))
                 {
              
                   foreach ($request->input('ref_name') as $key => $value)
                     {
                        $empty2 = $request->input('ref_name')[$key];
                        if(is_null($empty2))
                        {
                            $insert2 = [];
                        }
                         else
                         {
                              
                             $kuraref = \App\KuraReferee::where('token', $token)  
                                                        ->where('ref_name',$request->input('ref_name')[$key]) 
                                                        ->where('ref_company',$request->input('ref_company')[$key])
                                                              ->first();
                              if (!empty($kuraref)) 
                                {
                                    $upd = \App\KuraReferee::findorfail($kuraref->id);
                                    $upd->ref_name = $request->input('ref_name')[$key];
                                    $upd->ref_company = $request->input('ref_company')[$key];
                                    $upd->ref_position = $request->input('ref_position')[$key];
                                    $upd->ref_email = $request->input('ref_email')[$key];
                                       $upd->ref_phone = $request->input('ref_phone')[$key];
                                    $upd->save();                        
                                }
                                else
                                {
                            $insert2[] =
                                     [
                                      'ref_name'=>$request->input('ref_name')[$key],
                                      'ref_company' =>$request->input('ref_company')[$key],
                                      'ref_position'=>$request->input('ref_position')[$key],
                                      'ref_email'=>$request->input('ref_email')[$key],
                                      'ref_phone'=>$request->input('ref_phone')[$key],
                                      'token' => $token,                              
                                     ];
                         }
                     }
                    }
                  }

                     
                      if(!empty($request->input('employer')))
                 {
                         foreach ($request->input('employer') as $key => $value)
                     {
                        $empty = $request->input('employer')[$key];
                        if(is_null($empty))
                        {
                            $insert3 = [];
                        }
                         else
                         {
                            $kuraref = \App\KuraEmployer::where('token', $token)  
                                                        ->where('employer',$request->input('employer')[$key]) 
                                                        ->where('position',$request->input('position')[$key])
                                                              ->first();
                              if (!empty($kuraref)) 
                                {
                                    $upd = \App\KuraEmployer::findorfail($kuraref->id);
                                    $upd->employer = $request->input('employer')[$key];
                                    $upd->position = $request->input('position')[$key];
                                    $upd->from = $request->input('from')[$key];
                                    $upd->to = $request->input('to')[$key];
                                       $upd->contact_person = $request->input('contact_person')[$key];
                                    $upd->save();                        
                                }
                                else
                                {
                              $insert3[] =
                                     [
                                      'token' => $token,  
                                       'employer'  => $request->input('employer')[$key],     
                                      'position'  => $request->input('position')[$key],
                                      'from'  => $request->input('from')[$key],
                                      'to'  => $request->input('to')[$key],
                                       'contact_person' => $request->input('contact_person')[$key],
                      
                                     ];  
                                                        }                    # code...
                         }                    
                     
                     }
                    }


                      if(!empty($request->input('checklist')))
                 {
                   foreach ($request->input('checklist') as $key => $value)
                     {
                        $empty = $request->input('checklist')[$key];
                        if(is_null($empty))
                        {
                            $insert4 = [];
                        }
                         else
                         {
                             $updateother = \App\ApplicantCreteria::where('app_token', $token)  
                                                        ->where('job_token',$request->input('job_ref')[$key]) 
                                                        ->where('requirement',$request->input('checklist')[$key])
                                                              ->first();
                              if (!empty($updateother)) 
                                {
                                    $upd = \App\ApplicantCreteria::findorfail($updateother->id);
                                    $upd->passed = $request->input('passed')[$key];
                                    $upd->comments = $request->input('comments')[$key];
                                    $upd->save();                        
                                }
                                else
                                {
                                  $insert4[] =
                                        [
                                          'app_token' => $token,  
                                          'job_token'  => $request->input('job_ref')[$key],     
                                          'passed'  => $request->input('passed')[$key],
                                          'requirement'  => $request->input('checklist')[$key],
                                          'comments'  => $request->input('comments')[$key],
                                          'created_at' => \Carbon\Carbon::now(),
                                          
                          
                                        ];   
                                  }                   # code...
                         }                    
                     
                     }
                    }

                  $re =  \App\ApplicantMark::all()->where('job_token',$token)->first();       
                  if (empty($re)) 
                  {
                     $app = new \App\ApplicantMark();
                      $app->job_token = $token;
                      $app->total = $total;
                      $app->passed = $pass;
                      $app->percentage = $percentage;
                      $app->save();
                  }
                  else
                  {
                       $app =  \App\ApplicantMark::findorfail($re->id);
                        $app->job_token = $token;
                        $app->total = $total;
                        $app->passed = $pass;
                        $app->percentage = $percentage;
                        $app->save();
                  }
           
     if(!empty($insert4)){\DB::table('applicant_creterias')->insert($insert4);}

                    
        
           // if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
           // if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
           if(!empty($insert2)){\DB::table('kura_referees')->insert($insert2);}
           if(!empty($insert3)){\DB::table('kura_employers')->insert($insert3);}
           $app = Jobapp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = Jobapp::findorfail($app->id);
                $apps->signed = $signed;
                $apps->comments = $request->input('user_comments');
                $apps->app_status = 'Complete';
                $apps->save();
            }
        return redirect('my-apps1')->with('status','Completed Successfully'); //
    }

     public function attach(Request $request)

    {
      $token = $request->input('token');
      $media = $request->file('cv');
       $at = $request->file('files');                

                          if($request->hasfile('cv'))
                          { 
                           $attach = new KuraAttachment();
                           $attach->token = $token;
                           $attach->type = 'CV';
                             if (!empty($media)) {
                                    $destinationPath = storage_path('app_files');
                                    $filename = ''.$token.'-CV-'.time().'.'.$media->getClientOriginalExtension();
                                    $media->move($destinationPath, $filename);
                                    $files = $filename;
                                    $attach->file = $files;
                                  }
                              $attach->save();
                                 
                             }

                               $files1=[];
 // return $request;
         if($request->hasfile('files'))
          { 
             $upl = new KuraAttachment();
             $upl->token = $token; 
             $upl->type = 'Support'; 
            foreach ($at as $files) 
              {             
                if (!empty($files)) 
                {
                    $destinationPath = storage_path('app_files');
                    $filename1 = time().'-SUPPORT-'.$token.'.'.$files->getClientOriginalExtension();
                    // $filename = $media->getClientOriginalName();
                    $files->move($destinationPath, $filename1);
                    $files1[] = $filename1;
                  }
                }
              $upl->file = implode(';', $files1);
              $upl->save();
             }
         $app = Jobapp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = Jobapp::findorfail($app->id);
                $apps->app_status = 'Complete';
                $apps->save();
            }

       return redirect('my-apps')->with('status','Completed Successfully'); //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function readtxt()
    {
        $test = public_path('ref\ref.txt');
        //dd($test);
        foreach(file($test) as $line) 

        {

          $searchStr3= "Acquirer Reference Nbr";
          $searchStr4= "Destination Amount";          
          $searchStr5= "Merchant Name";

          $searchStr6= "Message Reason Code";
          $searchStr7= "Dispute Condition";          
        
          $searchStr1= "Acct Number & Extension";
          $searchStr2= "Destination Amount";          
          $searchStr= "Merchant Country Code";

            if(strpos($line,$searchStr3)) 

         {
            $p3[] = $line;
         }
         else
         {
           $p3[]= '';
         }

          if(strpos($line,$searchStr4)) 

         {
            $p4[] = $line;
         }
         else
         {
           $p4[]= '';
         }


           if(strpos($line,$searchStr5)) 

         {
            $p5[] = $line;
         }
         else
         {
           $p5[]= '';
         }

           if(strpos($line,$searchStr6)) 

         {
            $p6[] = $line;
         }
         else
         {
           $p6[]= '';
         }


           if(strpos($line,$searchStr7)) 

         {
            $p7[] = $line;
         }
         else
         {
           $p7[]= '';
         }

         

         if(strpos($line,$searchStr2)) 

         {
            $p2[] = $line;
         }
         else
         {
           $p2[]= '';
         }

         if(strpos($line,$searchStr1)) 

         {
            $p1[] = $line;
         }
         else
         {
           $p1[]= '';
         }

         if(strpos($line,$searchStr)) 

         {
            $p[] = $line;
         }
         else
         {
           $p[]= '';
         }

         $k[] = !empty($p1).'-'.!empty($p2).'-'.!empty($p);

        

        }
        $arr = array_filter($p1);
        $arr2 = array_filter($p2);
        $arr3 = array_filter($p);
        $arr4 = array_filter($p4);
        $arr5 = array_filter($p5);
        $arr6 = array_filter($p6);
        $arr7 = array_filter($p7);

       // dd(count($arr).'-'.count($arr4).'-'.count($arr5).'-'.count($arr6).'-'.count($arr7).'-'.count($arr3));
         // dd($arr5);

        $f = array_merge($arr,$arr3);
        dd($f);
foreach(array_combine($arr, $arr4) as $f => $n) {
    echo $f.$n;
    echo "<br/>";
}


    //      $full = array();
    // foreach($arr3 as $key=>$val)
    // {
    //   dd($arr2[$key]);
    //      $full[] = array_merge($val, $arr2[$key]);
    // }
    // echo "<pre>";
    // print_r($full);

    //     dd(array_filter($p1));
    }

    public function update_person(Request $request)

    {
      $check = Jobapp::where('token', $request->input('token'))->first();
      $data =  Jobapp::findorfail($check->id);
        $data->ref_token = $request->input('job_id');
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
         $data->app_id = $request->input('app_id');
        $data->app_email = $request->input('email');
       
        $data->captured_by = Auth::id();
        $data->status ='Success';
        $data->save();
      
      
        $app = KurraApp::all()->where('token',$request->input('token'))->first();
        $person =  KurraApp::findorfail($app->id);
        $person->token = $request->input('token');
        $person->title = $request->input('title');
        $person->fname = $request->input('fname');
        $person->lname = $request->input('lname');
        $person->oname = $request->input('oname');
        $person->po_box = $request->input('po_box');
        $person->postal_code = $request->input('postal_code');
        $person->phone_no = $request->input('phone_no');
        $person->email = $request->input('email');
        $person->dob = $request->input('dob');
        $person->gender = $request->input('gender');
        $person->passport = $request->input('passport');
        $person->county = $request->input('county');
        $person->district = $request->input('district');
        $person->is_disabled = $request->input('is_disabled');
        $person->disability = $request->input('disability');
        $person->current_salary = $request->input('current_salary');
        $person->expected_salary = $request->input('expected_salary');
        $person->is_convicted = $request->input('is_convicted');
        $person->convicted = $request->input('convicted');
         $person->is_dismissed = $request->input('is_dismissed');
        $person->dismissed = $request->input('dismissed');
        $person->save();



        return redirect('jobs-apps-steps-two/'.$check->token)->with('status','Applicant Personal Info Updated');
    }


    public function update_cert(Request $request)

    {
       $token = $request->input('token');

             foreach ($request->input('edu') as $key => $value)
                     {
                        
                         $emptys = $request->input('edu')[$key];
                        if(is_null($emptys))
                        {
                            $insert = [];
                        }
                         else
                         {  
                        $updateedu = \App\KuraEducation::where('token', $token)  
                                                        ->where('edu',$request->input('edu')[$key]) 
                                                        ->where('cert1',$request->input('cert')[$key])
                                                        ->first();
                        if (!empty($updateedu)) 
                          {
                             $upd = \App\KuraEducation::findorfail($updateedu->id);
                              $upd->edu = $request->input('edu')[$key];
                              $upd->cert1 = $request->input('cert')[$key];
                              $upd->institution1 = $request->input('institution')[$key];
                              $upd->year1 = $request->input('year')[$key];
                              $upd->save();                        
                          }    

                          else
                          {
                            $insert[] =
                                     [
                                      'token' => $token,    
                                      'edu'  => $request->input('edu')[$key],                                  
                                      'cert1'  => $request->input('cert')[$key],
                                      'institution1'  => $request->input('institution')[$key],
                                      'year1'  => $request->input('year')[$key],
                                      ];
                          }                
                        
                         }
                    }

                    if(!empty($request->input('cert1')))
                    {
                     foreach ($request->input('cert1') as $key => $value)
                     {
                        $empty1 = $request->input('cert1')[$key];
                        if(is_null($empty1))
                        {
                            $insert1 = [];
                        }
                         else
                         {
                            $updatecert = \App\KuraCert::where('token', $token)  
                                                        ->where('cert',$request->input('cert1')[$key]) 
                                                        ->where('institution',$request->input('institution1')[$key])
                                                        ->first();
                        if (!empty($updatecert)) 
                          {
                             $upd = \App\KuraCert::findorfail($updatecert->id);
                              $upd->cert = $request->input('cert1')[$key];
                              $upd->institution = $request->input('institution1')[$key];
                              $upd->reg_no = $request->input('reg_no')[$key];
                              $upd->year = $request->input('year1')[$key];
                              $upd->save();                        
                          }    

                          else
                          {
                                             
                              $insert1[] =
                                     [
                                      'token' => $token,       
                                      'cert'  => $request->input('cert1')[$key],
                                      'institution'  => $request->input('institution1')[$key],
                                       'reg_no'  => $request->input('reg_no')[$key],
                                      'year'  => $request->input('year1')[$key],                             
                                     ];
                            }
                          }
                     }
                   }
                       if(!empty($request->input('member')))
                       {
                     foreach ($request->input('member') as $key => $value)
                     {
                        $empty2 = $request->input('member')[$key];
                        if(is_null($empty2))
                        {
                            $insert2 = [];
                        }
                         else
                         {
                             $updatemember = \App\KuraMembership::where('token', $token)  
                                                        ->where('member',$request->input('member')[$key]) 
                                                        ->where('body',$request->input('body')[$key])
                                                        ->first();
                        if (!empty($updatemember)) 
                          {
                              $upd = \App\KuraMembership::findorfail($updatemember->id);
                              $upd->member = $request->input('member')[$key];
                              $upd->body = $request->input('body')[$key];
                              $upd->save();                        
                          }
                          else
                          {
                               $insert2[] =
                                     [
                                      'token' => $token,       
                                      'member'  => $request->input('member')[$key],
                                      'body'  => $request->input('body')[$key],
                                      'membno'  => $request->input('membno')[$key],                             
                                     ];
                          }    
                                             
                         
                         }
                     }
                   }
                 if(!empty($request->input('training')))
                 {
                         foreach ($request->input('training') as $key => $value)
                     {
                        $empty = $request->input('training')[$key];
                        if(is_null($empty))
                        {
                            $insert3 = [];
                        }
                         else
                         {
                            $updateother = \App\KuraOther::where('token', $token)  
                                                        ->where('training',$request->input('training')[$key]) 
                                                        ->where('cert2',$request->input('cert2')[$key])
                                                              ->first();
                              if (!empty($updateother)) 
                                {
                                    $upd = \App\KuraOther::findorfail($updateother->id);
                                    $upd->training = $request->input('training')[$key];
                                    $upd->cert2 = $request->input('cert2')[$key];
                                    $upd->institution2 = $request->input('institution2')[$key];
                                    $upd->year2 = $request->input('year2')[$key];
                                    $upd->save();                        
                                }
                                else
                                {
                                    $insert3[] =
                                           [
                                            'token' => $token,  
                                             'training'  => $request->input('training')[$key],     
                                            'cert2'  => $request->input('cert2')[$key],
                                            'institution2'  => $request->input('institution2')[$key],
                                            'year2'  => $request->input('year2')[$key], 
                            
                                           ];                      # code...
                                }                          
                          }                    
                     
                     }
                   }

                    
        
           if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
           if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
           if(!empty($insert2)){\DB::table('kura_memberships')->insert($insert2);}
           if(!empty($insert3)){\DB::table('kura_others')->insert($insert3);}
           $check = Jobapp::all()->where('token',$token)->first();
           //  $req = \App\Required::all()->where('ref_token',$id);
           // if (!empty($app)) 
           //  {
           //      $apps = Jobapp::findorfail($app->id);
           //      $apps->app_status = 'Stage2';
           //      $apps->save();
           //  }


        return redirect('jobs-apps-steps-three/'.$check->token)->with('status','Applicant Personal Info Updated');
    }

}
