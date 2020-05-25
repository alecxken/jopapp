<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KurraApp;
use App\JobApp;
use App\KuraAttachment;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function cert1(Request $request)
    {

      $email = $request->input('email');
      $id =  $request->input('job_id');
                    // $token = Token::Unique('jobs','token',5);
                    // $t = date("Y-M",strtotime("now"));
                    $token = $request->input('token');; 
                    $check = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_email',$email)
                                          ->first();

                                          //return $check;
                    $check1 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_email',$email)
                                          ->where('app_status','Stage2')
                                          ->first();
                    $check2 = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_email',$email)
                                           ->where('app_status','Stage3')
                                          ->first();

                     
         if (!empty($check2) ){
             $token = $check->token;
            return view('backapp.attach',compact('token'));
        }
        if (!empty($check1) ){
             $token = $check->token;
            return view('backapp.employee',compact('token'));
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
        $data->app_email = $email;
        $data->app_id = $email;
        $data->status ='Success';
        $data->save();
      
        }
        else
        {
        $data = new Jobapp();
        $data->token = $token;
        $data->ref_token = $token;
        $data->app_date = \Carbon\Carbon::today();
        $data->app_status = 'Pending';
        $data->app_email = $email;
        $data->app_id = $email;
        $data->status ='Success';
        $data->save();
        }
       
        

     
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
        $person->save();

      return view('backapp.cert',compact('token'));  //

        return view('apply1',compact('token','email'));
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
           $app = JobApp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = JobApp::findorfail($app->id);
                $apps->app_status = 'Stage2';
                $apps->save();
            }
       return view('apps.employee',compact('token')); //
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
           $app = JobApp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = JobApp::findorfail($app->id);
                $apps->app_status = 'Stage3';
                $apps->save();
            }
       return view('apps.attach',compact('token')); //
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
         $app = JobApp::all()->where('token',$token)->first();
           if (!empty($app)) 
            {
                $apps = JobApp::findorfail($app->id);
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
}
