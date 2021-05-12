<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Jobapp;
use App\KurraApp;
use App\ApplicantsView;
use App\ApplicantsData;
 use App\Charts\SampleChart;
  use App\Charts\ApplicantsChart;
  // use App\Http\Requests\StoreDeviceRequest;
use Rap2hpoutre\FastExcel\FastExcel;
// use App\Jobs\EodJob;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all()->count();
        $jobapp = Jobapp::all()->count();
         
              $post = ApplicantsView::all()->pluck('title');
              $num = ApplicantsView::all()->pluck('num');

               //return $post;
                $chart = new ApplicantsChart;
                $chart->labels($post);
                $chart->dataset('Number of Applicants', 'bar', $num);

                 $sam = new SampleChart;
                $sam->labels($post);
                $sam->dataset('My dataset', 'pie', $num);
     
                // $chart = Chart::create('pie', 'highcharts')

                //  
        return view('data.dashboard',compact('jobs','jobapp','chart','sam'));
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

      public function applicantdata()
        {
            $applicantdata = 'APPLICANT-'.date('D-M').'-SUMMARY.xlsx';
            $datas = \App\ViewApplicant::all();
            $dta = (new FastExcel($datas))->export(storage_path('summary/'.$applicantdata));
            $path = storage_path('summary/');
            $files = \File::allfiles($path);


           foreach ($files as  $path) 
             {
               $file = pathinfo($path);

               $data[] =  $file['basename'];
             }


           return view('reports.applicantreport',compact('data'));
        }


     public function downloadfile($id)
    {

    //  return public_path('bo/BO/'.$id);
      if (file_exists(storage_path('summary/'.$id)))
      {
return response()->download(storage_path('summary/'.$id));
      }
  }

       public function analyze()
    {
       $creteria;
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
