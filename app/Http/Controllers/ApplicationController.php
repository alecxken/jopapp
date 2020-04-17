<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KurraApp;
use App\JobApp;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

                    
        
           // if(!empty($insert)){\DB::table('kura_education')->insert($insert);}
           // if(!empty($insert1)){\DB::table('kura_certs')->insert($insert1);}
           // if(!empty($insert2)){\DB::table('kura_memberships')->insert($insert2);}
           // if(!empty($insert3)){\DB::table('kura_others')->insert($insert3);}
           // $app = JobApp::all()->where('token',$token)->first();
           // if (!empty($app)) 
           //  {
           //      $apps = JobApp::findorfail($app->id);
           //      $apps->app_status = 'Stage2';
           //      $apps->save();
           //  }
       return view('apps.employee',compact('token')); //
    }


   public function referee()
    {
       return view('apps.referee'); //
    }

     public function attach()
    {
       return view('apps.attach'); //
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
