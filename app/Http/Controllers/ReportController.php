<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Job;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Main applicants report page
     */
    public function index()
    {
        $jobs = Job::select('token', 'title', 'prefix')->orderBy('title')->get();

        $totalApplicants = DB::table('view_applicants')->count();
        $totalJobs       = Job::count();
        $totalSigned     = DB::table('jobapps')->where('signed', 1)->count();
        $totalChecked    = DB::table('applicant_creterias')->distinct('app_id')->count('app_id');

        return view('reports.report_index', compact(
            'jobs', 'totalApplicants', 'totalJobs', 'totalSigned', 'totalChecked'
        ));
    }

    /**
     * Yajra DataTables JSON endpoint for applicants report
     */
    public function data(Request $request)
    {
        $query = DB::table('view_applicants as va');

        // Filter by job/position
        if ($request->filled('job_token')) {
            $job = Job::where('token', $request->job_token)->first();
            if ($job) {
                $query->where('va.job', $job->title);
            }
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('va.gender', $request->gender);
        }

        // Filter by checklist status
        if ($request->filled('checklist_status')) {
            $status = $request->checklist_status;

            if ($status === 'NOT_ASSESSED') {
                $assessedIds = DB::table('applicant_creterias')->distinct()->pluck('app_id')->toArray();
                $query->whereNotIn('va.app_id', $assessedIds);
            } else {
                // Get app_ids and classify them
                $allAppIds = (clone $query)->pluck('va.app_id')->toArray();

                $qualifying = [];
                foreach ($allAppIds as $appId) {
                    $rows = DB::table('applicant_creterias')->where('app_id', $appId)->get();
                    if ($rows->isEmpty()) continue;

                    $total  = $rows->count();
                    $passed = $rows->where('passed', 'YES')->count();

                    if ($status === 'PASS' && $passed === $total) {
                        $qualifying[] = $appId;
                    } elseif ($status === 'PARTIAL' && $passed > 0 && $passed < $total) {
                        $qualifying[] = $appId;
                    } elseif ($status === 'FAIL' && $passed === 0) {
                        $qualifying[] = $appId;
                    }
                }

                $query->whereIn('va.app_id', $qualifying);
            }
        }

        $data = $query->select('va.*');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('full_name', function ($row) {
                return trim($row->fname . ' ' . $row->lname);
            })
            ->addColumn('checklist_badge', function ($row) {
                $rows  = DB::table('applicant_creterias')->where('app_id', $row->app_id)->get();
                $total = $rows->count();

                if ($total === 0) {
                    return '<span class="label label-default"><i class="fa fa-minus-circle"></i> Not Assessed</span>';
                }

                $passed = $rows->where('passed', 'YES')->count();

                if ($passed === $total) {
                    return '<span class="label label-success"><i class="fa fa-check-circle"></i> PASS ('.$passed.'/'.$total.')</span>';
                } elseif ($passed > 0) {
                    return '<span class="label label-warning"><i class="fa fa-exclamation-triangle"></i> PARTIAL ('.$passed.'/'.$total.')</span>';
                }
                return '<span class="label label-danger"><i class="fa fa-times-circle"></i> FAIL (0/'.$total.')</span>';
            })
            ->addColumn('signed_badge', function ($row) {
                return $row->signed
                    ? '<span class="label label-success"><i class="fa fa-check"></i> Signed</span>'
                    : '<span class="label label-warning"><i class="fa fa-clock-o"></i> Pending</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="'.url('reports/applicant/'.$row->token).'"
                            class="btn btn-xs btn-info" title="View Full Profile">
                            <i class="fa fa-eye"></i> View
                        </a>';
            })
            ->rawColumns(['checklist_badge', 'signed_badge', 'action'])
            ->make(true);
    }

    /**
     * Full applicant detail page
     */
    public function show($token)
    {
        $applicant = DB::table('view_applicants')->where('token', $token)->first();

        if (!$applicant) {
            abort(404, 'Applicant not found.');
        }

        $education    = DB::table('kura_education')->where('token', $token)->get();
        $certificates = DB::table('kura_certs')->where('token', $token)->get();
        $memberships  = DB::table('kura_memberships')->where('token', $token)->get();
        $employers    = DB::table('kura_employers')->where('token', $token)->get();
        $referees     = DB::table('kura_referees')->where('token', $token)->get();
        $others       = DB::table('kura_others')->where('token', $token)->get();
        $checklist    = DB::table('applicant_creterias')->where('app_token', $token)->get();

        return view('reports.report_show', compact(
            'applicant', 'education', 'certificates', 'memberships',
            'employers', 'referees', 'others', 'checklist'
        ));
    }

    /**
     * Checklist pass/fail report page
     */
    public function checklistIndex()
    {
        $jobs = Job::select('token', 'title', 'prefix')->orderBy('title')->get();

        $totalRequirements = DB::table('applicant_creterias')->count();
        $totalPassed       = DB::table('applicant_creterias')->where('passed', 'YES')->count();
        $totalFailed       = DB::table('applicant_creterias')->where('passed', 'NO')->count();
        $passRate          = $totalRequirements > 0
                                ? round(($totalPassed / $totalRequirements) * 100, 1)
                                : 0;

        return view('reports.checklist_report', compact(
            'jobs', 'totalRequirements', 'totalPassed', 'totalFailed', 'passRate'
        ));
    }

    /**
     * Yajra DataTables JSON endpoint for checklist report
     */
    public function checklistData(Request $request)
    {
        $query = DB::table('applicant_creterias as ac')
            ->leftJoin('jobs as jb', 'jb.token', '=', 'ac.job_token')
            ->leftJoin('kurra_apps as ka', 'ka.token', '=', 'ac.app_token')
            ->select(
                'ac.id',
                'ac.app_id',
                'jb.title as job_title',
                'jb.prefix as job_prefix',
                DB::raw("CONCAT(COALESCE(ka.fname,''), ' ', COALESCE(ka.lname,'')) as full_name"),
                'ac.requirement',
                'ac.passed',
                'ac.comments',
                'ac.app_token'
            );

        if ($request->filled('job_token')) {
            $query->where('ac.job_token', $request->job_token);
        }

        if ($request->filled('passed')) {
            $query->where('ac.passed', $request->passed);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('status_badge', function ($row) {
                if ($row->passed === 'YES') {
                    return '<span class="label label-success label-md">
                                <i class="fa fa-check-circle"></i> PASS
                            </span>';
                } elseif ($row->passed === 'NO') {
                    return '<span class="label label-danger label-md">
                                <i class="fa fa-times-circle"></i> FAIL
                            </span>';
                }
                return '<span class="label label-default"><i class="fa fa-question-circle"></i> -</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="'.url('reports/applicant/'.$row->app_token).'"
                            class="btn btn-xs btn-primary" title="View Applicant">
                            <i class="fa fa-user"></i> Profile
                        </a>';
            })
            ->rawColumns(['status_badge', 'action'])
            ->make(true);
    }
}
