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
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function index()
{
    // Fast counts (no full table load)
    $jobs   = Job::count();
    $jobapp = Jobapp::count();

    // One query for user stats
    $userStats = Jobapp::query()
        ->leftJoin('jobs', 'jobs.token', '=', 'jobapps.ref_token')
        ->leftJoin('users', 'users.id', '=', 'jobapps.captured_by')
        ->whereNotNull('jobs.title')
        ->selectRaw('COUNT(jobapps.id) as count, users.name as name')
        ->groupBy('users.name')
        ->orderBy('users.name')
        ->get();

    $user_name  = $userStats->pluck('name');
    $user_count = $userStats->pluck('count');

    // If no data, still render a colored bar (optional but solves "0 data" UX)
    if ($userStats->isEmpty()) {
        $user_name  = collect(['No data']);
        $user_count = collect([0]);
    }

    // Always generate colors to match label count
    $rand_color = $user_name->map(function () {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    })->toArray();

    // Applicants chart (avoid querying twice)
    $appViews = ApplicantsView::all(['title', 'num']);
    $post = $appViews->pluck('title');
    $num  = $appViews->pluck('num');

    $chart = new ApplicantsChart;
    $chart->labels($post);
    $chart->dataset('Number of Applicants', 'bar', $num);

    $sam = new SampleChart;
    $sam->labels($user_name->toArray());
    $sam->dataset('Data Capturers', 'bar', $user_count->toArray())
        ->backgroundColor($rand_color);

    return view('data.dashboard', compact('jobs', 'jobapp', 'chart', 'sam'));
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

            $path = storage_path('summary/');
            $files = \File::allfiles($path);


           foreach ($files as  $path)
             {
               $file = pathinfo($path);

               $data[] =  $file['basename'];
             }


           return view('reports.applicantreport',compact('data'));
        }

        public function updatedata()
        {
            $applicantdata = 'APPLICANT-'.date('D-M').'-SUMMARY.xlsx';
            $datas = \App\ViewApplicant::all();
            $dta = (new FastExcel($datas))->export(storage_path('summary/'.$applicantdata));
            return back()->with('status','successfully Completed');
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
