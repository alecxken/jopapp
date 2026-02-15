<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Jobapp;
use App\KurraApp;
use App\ApplicantsView;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardApiController extends Controller
{
    /**
     * Get application status breakdown
     */
    public function applicationStatusBreakdown()
    {
        $statusData = Jobapp::select('app_status', DB::raw('count(*) as count'))
            ->whereNotNull('app_status')
            ->where('app_status', '!=', '')
            ->groupBy('app_status')
            ->get();

        $data = [
            'categories' => $statusData->pluck('app_status')->toArray(),
            'series' => [[
                'name' => 'Applications',
                'data' => $statusData->pluck('count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get applications by job position
     */
    public function applicationsByJob()
    {
        $jobData = DB::table('jobs')
            ->leftJoin('jobapps', 'jobs.token', '=', 'jobapps.ref_token')
            ->select('jobs.title', DB::raw('count(jobapps.id) as count'))
            ->groupBy('jobs.title')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $data = [
            'categories' => $jobData->pluck('title')->toArray(),
            'series' => [[
                'name' => 'Applications',
                'data' => $jobData->pluck('count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get applications timeline (last 30 days)
     */
    public function applicationsTimeline()
    {
        $timeline = Jobapp::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $data = [
            'categories' => $timeline->pluck('date')->map(function($date) {
                return Carbon::parse($date)->format('M d');
            })->toArray(),
            'series' => [[
                'name' => 'Applications',
                'data' => $timeline->pluck('count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get geographic distribution by county
     */
    public function geographicDistribution()
    {
        $geoData = KurraApp::select('county', DB::raw('count(*) as count'))
            ->whereNotNull('county')
            ->where('county', '!=', '')
            ->groupBy('county')
            ->orderByDesc('count')
            ->limit(15)
            ->get();

        $data = [
            'categories' => $geoData->pluck('county')->toArray(),
            'series' => [[
                'name' => 'Applicants',
                'data' => $geoData->pluck('count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get gender distribution
     */
    public function genderDistribution()
    {
        $genderData = KurraApp::select('gender', DB::raw('count(*) as count'))
            ->whereNotNull('gender')
            ->where('gender', '!=', '')
            ->groupBy('gender')
            ->get();

        $seriesData = $genderData->map(function($item) {
            return [
                'name' => ucfirst($item->gender),
                'y' => (int) $item->count
            ];
        })->toArray();

        return response()->json(['series' => $seriesData]);
    }

    /**
     * Get data entry productivity by user
     */
    public function dataEntryProductivity()
    {
        $userData = Jobapp::leftJoin('users', 'users.id', '=', 'jobapps.captured_by')
            ->select('users.name', DB::raw('count(jobapps.id) as count'))
            ->whereNotNull('users.name')
            ->groupBy('users.name')
            ->orderByDesc('count')
            ->get();

        $data = [
            'categories' => $userData->pluck('name')->toArray(),
            'series' => [[
                'name' => 'Applications Entered',
                'data' => $userData->pluck('count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get education level distribution
     */
    public function educationDistribution()
    {
        $eduData = DB::table('kura_education')
            ->select('edu', DB::raw('count(*) as count'))
            ->whereNotNull('edu')
            ->where('edu', '!=', '')
            ->groupBy('edu')
            ->get();

        $seriesData = $eduData->map(function($item) {
            return [
                'name' => $item->edu,
                'y' => (int) $item->count
            ];
        })->toArray();

        return response()->json(['series' => $seriesData]);
    }

    /**
     * Get salary expectations analysis
     */
    public function salaryExpectations()
    {
        $salaryData = KurraApp::select('expected_salary', DB::raw('count(*) as count'))
            ->whereNotNull('expected_salary')
            ->where('expected_salary', '!=', '')
            ->where('expected_salary', '!=', '0')
            ->groupBy('expected_salary')
            ->orderBy('expected_salary')
            ->get();

        // Group into ranges
        $ranges = [
            '0-50k' => 0,
            '50k-100k' => 0,
            '100k-150k' => 0,
            '150k-200k' => 0,
            '200k+' => 0
        ];

        foreach ($salaryData as $salary) {
            $amount = (int) $salary->expected_salary;
            $count = (int) $salary->count;

            if ($amount < 50000) {
                $ranges['0-50k'] += $count;
            } elseif ($amount < 100000) {
                $ranges['50k-100k'] += $count;
            } elseif ($amount < 150000) {
                $ranges['100k-150k'] += $count;
            } elseif ($amount < 200000) {
                $ranges['150k-200k'] += $count;
            } else {
                $ranges['200k+'] += $count;
            }
        }

        $data = [
            'categories' => array_keys($ranges),
            'series' => [[
                'name' => 'Applicants',
                'data' => array_values($ranges)
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get top applicants by marks
     */
    public function topApplicants()
    {
        $topApplicants = DB::table('applicant_marks')
            ->join('kurra_apps', 'kurra_apps.token', '=', 'applicant_marks.app_token')
            ->select(
                DB::raw('CONCAT(kurra_apps.fname, " ", kurra_apps.lname) as name'),
                'applicant_marks.percentage'
            )
            ->whereNotNull('applicant_marks.percentage')
            ->where('applicant_marks.percentage', '!=', '')
            ->orderByDesc('applicant_marks.percentage')
            ->limit(10)
            ->get();

        $data = [
            'categories' => $topApplicants->pluck('name')->toArray(),
            'series' => [[
                'name' => 'Score (%)',
                'data' => $topApplicants->pluck('percentage')->map(function($item) {
                    return (float) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get upcoming job deadlines
     */
    public function upcomingDeadlines()
    {
        $deadlines = Job::select('title', 'deadline', DB::raw('count(jobapps.id) as applicant_count'))
            ->leftJoin('jobapps', 'jobs.token', '=', 'jobapps.ref_token')
            ->whereNotNull('deadline')
            ->where('deadline', '!=', '')
            ->groupBy('jobs.title', 'jobs.deadline')
            ->orderBy('jobs.deadline')
            ->limit(10)
            ->get();

        $data = [
            'categories' => $deadlines->pluck('title')->toArray(),
            'series' => [[
                'name' => 'Applicants',
                'data' => $deadlines->pluck('applicant_count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]],
            'deadlines' => $deadlines->pluck('deadline')->toArray()
        ];

        return response()->json($data);
    }

    /**
     * Get age distribution
     */
    public function ageDistribution()
    {
        $ageData = KurraApp::select('dob')
            ->whereNotNull('dob')
            ->where('dob', '!=', '')
            ->get();

        $ageGroups = [
            '18-25' => 0,
            '26-35' => 0,
            '36-45' => 0,
            '46-55' => 0,
            '56+' => 0
        ];

        foreach ($ageData as $applicant) {
            try {
                $age = Carbon::parse($applicant->dob)->age;

                if ($age >= 18 && $age <= 25) {
                    $ageGroups['18-25']++;
                } elseif ($age >= 26 && $age <= 35) {
                    $ageGroups['26-35']++;
                } elseif ($age >= 36 && $age <= 45) {
                    $ageGroups['36-45']++;
                } elseif ($age >= 46 && $age <= 55) {
                    $ageGroups['46-55']++;
                } else {
                    $ageGroups['56+']++;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        $data = [
            'categories' => array_keys($ageGroups),
            'series' => [[
                'name' => 'Applicants',
                'data' => array_values($ageGroups)
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get experience distribution
     */
    public function experienceDistribution()
    {
        $expData = DB::table('kura_employers')
            ->select('token', DB::raw('SUM(CAST(exp as UNSIGNED)) as total_exp'))
            ->whereNotNull('exp')
            ->where('exp', '!=', '')
            ->groupBy('token')
            ->get();

        $expGroups = [
            '0-2 years' => 0,
            '3-5 years' => 0,
            '6-10 years' => 0,
            '11-15 years' => 0,
            '16+ years' => 0
        ];

        foreach ($expData as $emp) {
            $years = (int) $emp->total_exp;

            if ($years >= 0 && $years <= 2) {
                $expGroups['0-2 years']++;
            } elseif ($years >= 3 && $years <= 5) {
                $expGroups['3-5 years']++;
            } elseif ($years >= 6 && $years <= 10) {
                $expGroups['6-10 years']++;
            } elseif ($years >= 11 && $years <= 15) {
                $expGroups['11-15 years']++;
            } else {
                $expGroups['16+ years']++;
            }
        }

        $data = [
            'categories' => array_keys($expGroups),
            'series' => [[
                'name' => 'Applicants',
                'data' => array_values($expGroups)
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get monthly application trends (last 12 months)
     */
    public function monthlyTrends()
    {
        $trends = Jobapp::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $data = [
            'categories' => $trends->pluck('month')->map(function($month) {
                return Carbon::parse($month)->format('M Y');
            })->toArray(),
            'series' => [[
                'name' => 'Applications',
                'data' => $trends->pluck('count')->map(function($item) {
                    return (int) $item;
                })->toArray()
            ]]
        ];

        return response()->json($data);
    }

    /**
     * Get disability statistics
     */
    public function disabilityStats()
    {
        $disabilityData = KurraApp::select('is_disabled', DB::raw('count(*) as count'))
            ->whereNotNull('is_disabled')
            ->where('is_disabled', '!=', '')
            ->groupBy('is_disabled')
            ->get();

        $seriesData = $disabilityData->map(function($item) {
            $label = $item->is_disabled == 'Yes' ? 'With Disability' : 'No Disability';
            return [
                'name' => $label,
                'y' => (int) $item->count
            ];
        })->toArray();

        return response()->json(['series' => $seriesData]);
    }

    /**
     * Get dashboard summary statistics
     */
    public function summaryStats()
    {
        $stats = [
            'total_jobs' => Job::count(),
            'total_applicants' => Jobapp::count(),
            'today_applications' => Jobapp::whereDate('created_at', Carbon::today())->count(),
            'active_jobs' => Job::where('status', 'Active')->count(),
            'pending_applications' => Jobapp::where('app_status', 'Pending')->count(),
            'completed_applications' => Jobapp::where('app_status', 'Completed')->count(),
            'this_week' => Jobapp::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
            'this_month' => Jobapp::whereMonth('created_at', Carbon::now()->month)->count(),
            'avg_per_job' => Job::count() > 0 ? round(Jobapp::count() / Job::count(), 2) : 0,
            'data_entry_users' => Jobapp::distinct('captured_by')->whereNotNull('captured_by')->count()
        ];

        return response()->json($stats);
    }
}
