@extends('layouts.template')
@section('content')

<div class="box-body">

  {{-- Page Header --}}
  <div class="row">
    <div class="col-md-12">
      <div style="background:linear-gradient(135deg,#3c8dbc,#367fa9); border-radius:6px; padding:18px 22px; margin-bottom:18px; box-shadow:0 2px 8px rgba(0,0,0,.15);">
        <div class="row">
          <div class="col-md-8">
            <h3 style="margin:0; color:#fff; font-weight:700;">
              <i class="fa fa-list-alt"></i>
              &nbsp;Checklist Report
            </h3>
            <p style="margin:4px 0 0; color:rgba(255,255,255,.8); font-size:13px;">
              Pass / Fail breakdown per applicant and requirement
            </p>
          </div>
          <div class="col-md-4 text-right">
            <a href="{{ url('reports') }}" class="btn btn-default btn-sm">
              <i class="fa fa-arrow-left"></i> Applicants Report
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Stats Cards --}}
  <div class="row" style="margin-bottom:5px;">
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-aqua" style="border-radius:6px 0 0 6px;"><i class="fa fa-list-ol"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Requirements</span>
          <span class="info-box-number">{{ $totalRequirements }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-green" style="border-radius:6px 0 0 6px;"><i class="fa fa-check-circle"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Passed</span>
          <span class="info-box-number">{{ $totalPassed }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-red" style="border-radius:6px 0 0 6px;"><i class="fa fa-times-circle"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Failed</span>
          <span class="info-box-number">{{ $totalFailed }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="info-box" style="border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,.12);">
        <span class="info-box-icon bg-yellow" style="border-radius:6px 0 0 6px;"><i class="fa fa-percent"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Overall Pass Rate</span>
          <span class="info-box-number">{{ $passRate }}%</span>
        </div>
      </div>
    </div>
  </div>

  {{-- Filters --}}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#00c0ef,#0097bc); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;"><i class="fa fa-filter"></i> &nbsp;Filters</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus" style="color:#fff;"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label><i class="fa fa-briefcase text-aqua"></i> &nbsp;Position / Job</label>
                <select class="form-control select2" id="cl-filter-job" style="width:100%;">
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
            <div class="col-md-3">
              <div class="form-group">
                <label><i class="fa fa-toggle-on text-aqua"></i> &nbsp;Pass / Fail Status</label>
                <select class="form-control" id="cl-filter-passed">
                  <option value="">— All Statuses —</option>
                  <option value="YES">✔ Pass</option>
                  <option value="NO">✖ Fail</option>
                </select>
              </div>
            </div>
            <div class="col-md-4" style="padding-top:25px;">
              <button id="cl-btn-apply" class="btn btn-info btn-md">
                <i class="fa fa-search"></i> &nbsp;Apply Filters
              </button>
              &nbsp;
              <button id="cl-btn-reset" class="btn btn-default btn-md">
                <i class="fa fa-refresh"></i> &nbsp;Reset
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Checklist DataTable --}}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
        <div class="box-header with-border" style="background:linear-gradient(135deg,#3c8dbc,#367fa9); border-radius:6px 6px 0 0;">
          <h3 class="box-title" style="color:#fff;">
            <i class="fa fa-table"></i> &nbsp;Checklist Details
          </h3>
          <div class="box-tools pull-right">
            <span id="cl-count" class="badge bg-light-blue" style="font-size:13px;"></span>
          </div>
        </div>
        <div class="box-body table-responsive" style="padding:15px;">
          <table id="checklist-table" class="table table-bordered table-hover table-striped" style="width:100%;">
            <thead style="background:#3c8dbc; color:#fff; font-size:12px;">
              <tr>
                <th style="width:40px;">#</th>
                <th>App ID</th>
                <th>Position</th>
                <th>Applicant Name</th>
                <th>Requirement</th>
                <th style="width:90px; text-align:center;">Status</th>
                <th>Comments</th>
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

  var clTable = $('#checklist-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: '{{ url("reports/checklist/data") }}',
      type: 'GET',
      data: function (d) {
        d.job_token = $('#cl-filter-job').val();
        d.passed    = $('#cl-filter-passed').val();
      }
    },
    columns: [
      { data: 'DT_RowIndex',   name: 'DT_RowIndex',  orderable: false, searchable: false, className: 'text-center' },
      { data: 'app_id',        name: 'ac.app_id',     className: 'text-center' },
      { data: 'job_title',     name: 'jb.title' },
      { data: 'full_name',     name: 'full_name',     orderable: false },
      { data: 'requirement',   name: 'ac.requirement' },
      { data: 'status_badge',  name: 'status_badge',  orderable: false, searchable: false, className: 'text-center' },
      { data: 'comments',      name: 'ac.comments',   defaultContent: '<span class="text-muted">—</span>' },
      { data: 'action',        name: 'action',        orderable: false, searchable: false, className: 'text-center' }
    ],
    pageLength: 25,
    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
    order: [[1, 'asc'], [4, 'asc']],
    language: {
      processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw text-aqua"></i> Loading...',
      emptyTable: '<i class="fa fa-inbox fa-2x text-muted"></i><br>No checklist records found.',
      zeroRecords: '<i class="fa fa-search fa-2x text-muted"></i><br>No matching records.'
    },
    drawCallback: function (settings) {
      var info = this.api().page.info();
      $('#cl-count').text(info.recordsDisplay + ' record(s)');
    }
  });

  $('#cl-btn-apply').on('click', function () { clTable.ajax.reload(); });

  $('#cl-btn-reset').on('click', function () {
    $('#cl-filter-job').val('').trigger('change');
    $('#cl-filter-passed').val('');
    clTable.ajax.reload();
  });

  $('#cl-filter-job').on('change', function () { clTable.ajax.reload(); });
  $('#cl-filter-passed').on('change', function () { clTable.ajax.reload(); });

  $('#cl-filter-job').select2({ placeholder: '— All Positions —', allowClear: true });
});
</script>

@endsection
