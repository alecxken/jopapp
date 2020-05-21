<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Jobapp;
use App\KurraApp;
use App\ApplicantsView;
 use App\Charts\SampleChart;
  use App\Charts\ApplicantsChart;
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
