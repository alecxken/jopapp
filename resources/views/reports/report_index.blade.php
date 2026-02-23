@extends('layouts.template')
@section('content')

<div class="box-body">

  {{-- Page Header --}}
  <div class="row">
    <div class="col-md-12">
      <div class="page-header" style="margin-top:0; border-bottom:2px solid #00a65a; padding-bottom:10px;">
        <h3 style="margin:0; color:#333;">
          <i class="fa fa-bar-chart text-green"></i>
          Applicants Report
          <small class="text-muted">— Customizable filters with live data</small>
        </h3>
      </div>
    </div>
  </div>

  {{-- Summary Stats Cards --}}
  <div class="row" style="margin-top:15px;">
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-green" style="border-radius:6px 0 0 6px;"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Applicants</span>
          <span class="info-box-number" id="stat-total">{{ $totalApplicants }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-aqua" style="border-radius:6px 0 0 6px;"><i class="fa fa-briefcase"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Open Positions</span>
          <span class="info-box-number">{{ $totalJobs }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-yellow" style="border-radius:6px 0 0 6px;"><i class="fa fa-pencil-square-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Signed Applications</span>
          <span class="info-box-number">{{ $totalSigned }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-red" style="border-radius:6px 0 0 6px;"><i class="fa fa-check-circle"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Checklist Assessed</span>
          <span class="info-box-number">{{ $totalChecked }}</span>
        </div>
      </div>
    </div>
  </div>

  {{-- Filters Panel --}}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#00a65a,#008d4c); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;">
            <i class="fa fa-filter"></i> &nbsp;Report Filters
          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus" style="color:#fff;"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label><i class="fa fa-briefcase text-green"></i> &nbsp;Position / Job</label>
                <select class="form-control select2" id="filter-job" style="width:100%;">
                  <option value="">— All Positions —</option>
                  @foreach($jobs as $job)
                    <option value="{{ $job->token }}">
                      {{ $job->title }}
                      @if($job->prefix) ({{ $job->prefix }}) @endif
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label><i class="fa fa-venus-mars text-green"></i> &nbsp;Gender</label>
                <select class="form-control" id="filter-gender">
                  <option value="">— All Genders —</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label><i class="fa fa-tasks text-green"></i> &nbsp;Checklist Status</label>
                <select class="form-control" id="filter-checklist">
                  <option value="">— All Statuses —</option>
                  <option value="PASS">✔ Pass (all requirements met)</option>
                  <option value="PARTIAL">⚠ Partial (some requirements met)</option>
                  <option value="FAIL">✖ Fail (no requirements met)</option>
                  <option value="NOT_ASSESSED">○ Not Yet Assessed</option>
                </select>
              </div>
            </div>
            <div class="col-md-4" style="padding-top:25px;">
              <button id="btn-apply-filters" class="btn btn-success btn-md">
                <i class="fa fa-search"></i> &nbsp;Apply Filters
              </button>
              &nbsp;
              <button id="btn-reset-filters" class="btn btn-default btn-md">
                <i class="fa fa-refresh"></i> &nbsp;Reset
              </button>
              &nbsp;
              <a href="{{ url('reports/checklist') }}" class="btn btn-info btn-md">
                <i class="fa fa-list-alt"></i> &nbsp;Checklist Report
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Data Table --}}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#3c8dbc,#367fa9); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;">
            <i class="fa fa-table"></i> &nbsp;Applicants List
          </h3>
          <div class="box-tools pull-right">
            <span id="filtered-count" class="badge bg-light-blue" style="font-size:13px;"></span>
          </div>
        </div>
        <div class="box-body table-responsive" style="padding:15px;">
          <table id="applicants-table" class="table table-bordered table-hover table-striped" style="width:100%;">
            <thead class="bg-success" style="color:#fff; font-size:12px;">
              <tr>
                <th style="width:40px;">#</th>
                <th>App ID</th>
                <th>Position</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Signed</th>
                <th>Checklist</th>
                <th style="width:80px;">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
$(document).ready(function () {

  var table = $('#applicants-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: '{{ url("reports/data") }}',
      type: 'GET',
      data: function (d) {
        d.job_token        = $('#filter-job').val();
        d.gender           = $('#filter-gender').val();
        d.checklist_status = $('#filter-checklist').val();
      }
    },
    columns: [
      { data: 'DT_RowIndex',    name: 'DT_RowIndex',    orderable: false, searchable: false, className: 'text-center' },
      { data: 'app_id',         name: 'app_id',         className: 'text-center' },
      { data: 'job',            name: 'job' },
      { data: 'full_name',      name: 'full_name',      orderable: false },
      { data: 'gender',         name: 'gender',         className: 'text-center' },
      { data: 'email',          name: 'email' },
      { data: 'phone_no',       name: 'phone_no',       className: 'text-center' },
      { data: 'signed_badge',   name: 'signed',         orderable: false, searchable: false, className: 'text-center' },
      { data: 'checklist_badge',name: 'checklist_badge',orderable: false, searchable: false, className: 'text-center' },
      { data: 'action',         name: 'action',         orderable: false, searchable: false, className: 'text-center' }
    ],
    pageLength: 25,
    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
    order: [[1, 'asc']],
    language: {
      processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw text-green"></i> Loading...',
      emptyTable: '<i class="fa fa-inbox fa-2x text-muted"></i><br>No applicants found for the selected filters.',
      zeroRecords: '<i class="fa fa-search fa-2x text-muted"></i><br>No matching applicants found.'
    },
    drawCallback: function (settings) {
      var info = this.api().page.info();
      $('#filtered-count').text(info.recordsDisplay + ' record(s)');
    }
  });

  // Apply filters button
  $('#btn-apply-filters').on('click', function () {
    table.ajax.reload();
  });

  // Reset filters button
  $('#btn-reset-filters').on('click', function () {
    $('#filter-job').val('').trigger('change');
    $('#filter-gender').val('');
    $('#filter-checklist').val('');
    table.ajax.reload();
  });

  // Also reload when any filter changes (select2 for job)
  $('#filter-job').on('change', function () {
    table.ajax.reload();
  });
  $('#filter-gender, #filter-checklist').on('change', function () {
    table.ajax.reload();
  });

  // Initialise Select2 on job filter
  $('#filter-job').select2({ placeholder: '— All Positions —', allowClear: true });

});
</script>

@endsection
