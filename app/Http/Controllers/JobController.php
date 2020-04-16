<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Token;
use Auth;
use App\Job;
use App\Jobapp;

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
        $job->requirements = $request->input('requirements');
        $job->qualification = $request->input('qualification');
        $job->deadline = $request->input('deadline');
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

                          //     if(!empty($files))
                          // {

                          //   $job->file = implode(';',$files);

                          // }

            $job->save();

            return back()->with('status','Successfully Uploaded');
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


    public function applynow($id)
    {
       
                    $token = Token::Unique('jobs','token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('AP-'.$token.'-'.$t); 
                    $check = Jobapp::all()->where('ref_token',$id)
                                          ->where('app_id',\Auth::id())
                                          ->where('app_email',\Auth::user()->email)
                                          ->where('status','Success')
                                          ->first();
                      $email=\Auth::user()->email;

                                          
        if (!empty($check)) {
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
            $applicant = new KurraApp();
            $applicant->token = $request->input('token');
            $applicant->title = $request->input('title');
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
}
