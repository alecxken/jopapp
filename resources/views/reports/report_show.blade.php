@extends('layouts.template')
@section('content')

<div class="box-body">

  {{-- Page Header --}}
  <div class="row">
    <div class="col-md-12">
      <div style="background:linear-gradient(135deg,#00a65a,#008d4c); border-radius:6px; padding:18px 22px; margin-bottom:18px; box-shadow:0 2px 8px rgba(0,0,0,.15);">
        <div class="row">
          <div class="col-md-8">
            <h3 style="margin:0; color:#fff; font-weight:700;">
              <i class="fa fa-user-circle-o"></i>
              &nbsp;{{ strtoupper($applicant->fname) }} {{ strtoupper($applicant->lname) }}
            </h3>
            <p style="margin:4px 0 0; color:rgba(255,255,255,.8); font-size:13px;">
              <i class="fa fa-id-badge"></i> App ID: <strong>{{ $applicant->app_id }}</strong>
              &nbsp;&nbsp;|&nbsp;&nbsp;
              <i class="fa fa-briefcase"></i> Position: <strong>{{ $applicant->job }}</strong>
            </p>
          </div>
          <div class="col-md-4 text-right">
            <a href="{{ url('reports') }}" class="btn btn-default btn-sm">
              <i class="fa fa-arrow-left"></i> Back to Report
            </a>
            <a href="{{ url('view-individual-details/'.$applicant->token) }}" class="btn btn-warning btn-sm">
              <i class="fa fa-external-link"></i> Classic View
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    {{-- LEFT: Personal Info --}}
    <div class="col-md-4">
      <div class="box box-primary" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:#3c8dbc; border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-address-card-o"></i> &nbsp;Personal Information</h3>
        </div>
        <div class="box-body" style="padding:0;">
          <table class="table table-condensed" style="margin:0; font-size:13px;">
            <tbody>
              <tr><td class="text-muted" style="width:45%; padding:8px 12px;"><i class="fa fa-user"></i> Full Name</td>
                  <td style="padding:8px 12px;"><strong>{{ $applicant->title }} {{ $applicant->fname }} {{ $applicant->oname }} {{ $applicant->lname }}</strong></td></tr>
              <tr style="background:#f9f9f9;"><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-envelope-o"></i> Email</td>
                  <td style="padding:8px 12px;">{{ $applicant->email }}</td></tr>
              <tr><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-phone"></i> Phone</td>
                  <td style="padding:8px 12px;">{{ $applicant->phone_no }}</td></tr>
              <tr style="background:#f9f9f9;"><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-calendar"></i> Date of Birth</td>
                  <td style="padding:8px 12px;">{{ $applicant->dob }}</td></tr>
              <tr><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-venus-mars"></i> Gender</td>
                  <td style="padding:8px 12px;">{{ $applicant->gender }}</td></tr>
              <tr style="background:#f9f9f9;"><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-map-marker"></i> P.O Box</td>
                  <td style="padding:8px 12px;">{{ $applicant->po_box }}, {{ $applicant->postal_code }}</td></tr>
              <tr><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-money"></i> Current Salary</td>
                  <td style="padding:8px 12px;">{{ number_format($applicant->current_salary) }}</td></tr>
              <tr style="background:#f9f9f9;"><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-money"></i> Expected Salary</td>
                  <td style="padding:8px 12px;">{{ number_format($applicant->expected_salary) }}</td></tr>
              <tr><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-wheelchair"></i> Disabled?</td>
                  <td style="padding:8px 12px;">
                    @if($applicant->is_disabled)
                      <span class="label label-info">Yes</span>
                    @else
                      <span class="label label-default">No</span>
                    @endif
                  </td></tr>
              <tr style="background:#f9f9f9;"><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-gavel"></i> Convicted?</td>
                  <td style="padding:8px 12px;">{{ $applicant->convicted }}</td></tr>
              <tr><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-ban"></i> Dismissed?</td>
                  <td style="padding:8px 12px;">{{ $applicant->dismissed }}</td></tr>
              <tr style="background:#f9f9f9;"><td class="text-muted" style="padding:8px 12px;"><i class="fa fa-pencil"></i> Signed</td>
                  <td style="padding:8px 12px;">
                    @if($applicant->signed)
                      <span class="label label-success"><i class="fa fa-check"></i> Yes</span>
                    @else
                      <span class="label label-warning"><i class="fa fa-clock-o"></i> Pending</span>
                    @endif
                  </td></tr>
            </tbody>
          </table>
        </div>
      </div>

      {{-- Checklist Summary --}}
      <div class="box box-success" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#00a65a,#008d4c); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-tasks"></i> &nbsp;Checklist Summary</h3>
        </div>
        <div class="box-body">
          @if($checklist->isEmpty())
            <div class="text-center text-muted" style="padding:20px 0;">
              <i class="fa fa-inbox fa-3x"></i>
              <p style="margin-top:10px;">No checklist recorded yet.</p>
            </div>
          @else
            @php
              $total  = $checklist->count();
              $passed = $checklist->where('passed', 'YES')->count();
              $pct    = round(($passed / $total) * 100);
            @endphp
            <div class="text-center" style="margin-bottom:12px;">
              @if($pct === 100)
                <span class="label label-success" style="font-size:16px; padding:8px 18px; border-radius:20px;">
                  <i class="fa fa-check-circle"></i> ALL PASS
                </span>
              @elseif($pct > 0)
                <span class="label label-warning" style="font-size:16px; padding:8px 18px; border-radius:20px;">
                  <i class="fa fa-exclamation-triangle"></i> PARTIAL
                </span>
              @else
                <span class="label label-danger" style="font-size:16px; padding:8px 18px; border-radius:20px;">
                  <i class="fa fa-times-circle"></i> FAIL
                </span>
              @endif
              <div class="progress" style="margin:10px 0 5px; border-radius:10px; height:18px;">
                <div class="progress-bar progress-bar-{{ $pct === 100 ? 'success' : ($pct > 0 ? 'warning' : 'danger') }}"
                     style="width:{{ $pct }}%; border-radius:10px; font-size:12px;">
                  {{ $pct }}%
                </div>
              </div>
              <small class="text-muted">{{ $passed }} of {{ $total }} requirements met</small>
            </div>
            @foreach($checklist as $item)
              <div class="clearfix" style="padding:5px 0; border-bottom:1px solid #f0f0f0; font-size:12px;">
                <span class="pull-left" style="max-width:80%;">
                  <i class="fa fa-angle-right text-green"></i> {{ $item->requirement }}
                  @if($item->comments)
                    <br><small class="text-muted" style="padding-left:14px;"><em>{{ $item->comments }}</em></small>
                  @endif
                </span>
                <span class="pull-right">
                  @if($item->passed === 'YES')
                    <span class="label label-success"><i class="fa fa-check"></i></span>
                  @else
                    <span class="label label-danger"><i class="fa fa-times"></i></span>
                  @endif
                </span>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>

    {{-- RIGHT: Qualifications --}}
    <div class="col-md-8">

      {{-- Education --}}
      @if($education->isNotEmpty())
      <div class="box box-info" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#00c0ef,#0097bc); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-graduation-cap"></i> &nbsp;Education</h3>
        </div>
        <div class="box-body table-responsive" style="padding:10px;">
          <table class="table table-bordered table-condensed table-hover" style="font-size:12px; margin:0;">
            <thead style="background:#e8f4ff;"><tr>
              <th>Qualification</th><th>Field / Certificate</th><th>Institution</th><th>Year</th>
            </tr></thead>
            <tbody>
              @foreach($education as $e)
              <tr>
                <td>{{ $e->edu }}</td>
                <td>{{ $e->cert1 }}</td>
                <td>{{ $e->institution1 }}</td>
                <td>{{ $e->year1 }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif

      {{-- Certificates --}}
      @if($certificates->isNotEmpty())
      <div class="box box-warning" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#f39c12,#d68910); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-certificate"></i> &nbsp;Professional Certificates</h3>
        </div>
        <div class="box-body table-responsive" style="padding:10px;">
          <table class="table table-bordered table-condensed table-hover" style="font-size:12px; margin:0;">
            <thead style="background:#fff8e1;"><tr>
              <th>Certificate</th><th>Institution</th><th>Reg No</th><th>Year</th>
            </tr></thead>
            <tbody>
              @foreach($certificates as $c)
              <tr>
                <td>{{ $c->cert }}</td>
                <td>{{ $c->institution }}</td>
                <td>{{ $c->reg_no ?? '-' }}</td>
                <td>{{ $c->year }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif

      {{-- Memberships --}}
      @if($memberships->isNotEmpty())
      <div class="box box-primary" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#3c8dbc,#367fa9); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-id-card"></i> &nbsp;Professional Memberships</h3>
        </div>
        <div class="box-body table-responsive" style="padding:10px;">
          <table class="table table-bordered table-condensed table-hover" style="font-size:12px; margin:0;">
            <thead style="background:#e8f0ff;"><tr>
              <th>Membership</th><th>Regulatory Body</th><th>Membership No</th>
            </tr></thead>
            <tbody>
              @foreach($memberships as $m)
              <tr>
                <td>{{ $m->member }}</td>
                <td>{{ $m->body }}</td>
                <td>{{ $m->membno }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif

      {{-- Employment History --}}
      @if($employers->isNotEmpty())
      <div class="box box-success" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#00a65a,#008d4c); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-building-o"></i> &nbsp;Employment History</h3>
        </div>
        <div class="box-body table-responsive" style="padding:10px;">
          <table class="table table-bordered table-condensed table-hover" style="font-size:12px; margin:0;">
            <thead style="background:#e8fff0;"><tr>
              <th>Employer</th><th>Position</th><th>From</th><th>To</th><th>Contact Person</th><th>Status</th>
            </tr></thead>
            <tbody>
              @foreach($employers as $em)
              <tr>
                <td>{{ $em->employer }}</td>
                <td>{{ $em->position }}</td>
                <td>{{ $em->from }}</td>
                <td>{{ $em->to }}</td>
                <td>{{ $em->contact_person }}</td>
                <td>
                  @if($em->status)
                    <span class="label label-{{ $em->status === 'Current' ? 'success' : 'default' }}">{{ $em->status }}</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif

      {{-- Other Training --}}
      @if($others->isNotEmpty())
      <div class="box box-default" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#555,#333); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-book"></i> &nbsp;Other Training / Skills</h3>
        </div>
        <div class="box-body table-responsive" style="padding:10px;">
          <table class="table table-bordered table-condensed table-hover" style="font-size:12px; margin:0;">
            <thead style="background:#f5f5f5;"><tr>
              <th>Training</th><th>Certificate</th><th>Institution</th><th>Year</th>
            </tr></thead>
            <tbody>
              @foreach($others as $o)
              <tr>
                <td>{{ $o->training }}</td>
                <td>{{ $o->cert2 }}</td>
                <td>{{ $o->institution2 }}</td>
                <td>{{ $o->year2 }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif

      {{-- Referees --}}
      @if($referees->isNotEmpty())
      <div class="box box-danger" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#dd4b39,#c23321); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-users"></i> &nbsp;Referees</h3>
        </div>
        <div class="box-body" style="padding:10px;">
          <div class="row">
            @foreach($referees as $r)
            <div class="col-md-6" style="margin-bottom:8px;">
              <div style="border:1px solid #f2dede; border-radius:5px; padding:10px 12px; background:#fff9f9; font-size:12px;">
                <strong style="font-size:13px; color:#c23321;"><i class="fa fa-user-o"></i> {{ $r->ref_name }}</strong><br>
                <span class="text-muted"><i class="fa fa-building-o"></i> {{ $r->ref_company }}</span><br>
                <span class="text-muted"><i class="fa fa-suitcase"></i> {{ $r->ref_position }}</span><br>
                <span><i class="fa fa-envelope-o"></i> {{ $r->ref_email }}</span><br>
                <span><i class="fa fa-phone"></i> {{ $r->ref_phone }}</span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endif

    </div>{{-- end right col --}}
  </div>{{-- end row --}}
</div>

@endsection
