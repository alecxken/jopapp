@extends('layouts.template')
@section('content')

<div class="box-body">
   {!! Form::open(['method'=> 'post','url' => 'store-checklist-filter', 'files' => true ]) !!}
        <div class="box-body">

           <div class="form-group col-md-8 center">
             {!! Form::label('weight', 'Job Position ', ['class' => 'awesome'])!!}
             <select class="form-control select2" name="post" id="residence" required>
               <option  value="">SELECT JOB POSITION</option>
               @foreach($post as  $columns)
                    <option value="{{$columns->token}}">{{$columns->title}}</option>
               @endforeach
             </select>
           </div>

          <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'ACTION ', ['class' => 'awesome'])!!}
             <br>
             <button class="btn btn-success form-control" type="Submit">
               <i class="fa fa-filter"></i> Click To Filter
             </button>
          </div>
          </div>
            {!!Form::close()!!}
<div class="row">

   <div class="col-md-12">
       <div class="box box-primary" style="border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,.1);">
            <div class="box-header with-border" style="background:linear-gradient(135deg,#3c8dbc,#367fa9); border-radius:6px 6px 0 0;">
              <h3 class="box-title" style="color:#fff;">
                <i class="fa fa-table"></i> &nbsp;Checklist Results View
              </h3>
              <div class="box-tools pull-right">
                @if(!empty($data) && count($data) > 0)
                  <span class="badge bg-light-blue" style="font-size:13px;">{{ count($data) }} applicant(s)</span>
                @endif
              </div>
            </div>
       		 <div class="box-body table-responsive" id="table_wrapper" style="padding:15px;">
                @if(!empty($data) && count($data) > 0)
                     <table id="report-table" class="table table-bordered table-hover table-striped" style="font-size:11px; width:100%;">
                            <thead style="background:#3c8dbc; color:#fff; font-size:11px;">
                                <tr>
                                    <th class="text-center" style="vertical-align:middle;">Last Name</th>
                                    <th class="text-center" style="vertical-align:middle;">First Name</th>
                                    <th class="text-center" style="vertical-align:middle;">Other Names</th>
                                    <th class="text-center" style="vertical-align:middle;">Disability</th>
                                    <th class="text-center" style="vertical-align:middle;">DOB</th>
                                    <th class="text-center" style="vertical-align:middle;">Phone No</th>
                                    <th class="text-center" style="vertical-align:middle;">Address</th>
                                    <th class="text-center" style="vertical-align:middle;">Postal Code</th>
                                    <th class="text-center" style="vertical-align:middle;">Email Address</th>
                                    <th class="text-center" style="vertical-align:middle;">Current Employer</th>
                                    <th class="text-center" style="vertical-align:middle;">Position</th>
                                    @foreach ($job as $jb)
                                        <th class="text-center" style="vertical-align:middle; min-width:220px; max-width:300px; white-space:normal;">
                                            {{ $jb->requirement }}
                                        </th>
                                    @endforeach
                                    <th class="text-center" style="vertical-align:middle; font-weight:bold; background:#00a65a;">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    @php
                                        // Get all checklist items for this applicant
                                        $applicantChecklist = isset($checklistByApplicant[$user->token])
                                            ? $checklistByApplicant[$user->token]
                                            : [];

                                        // Count total requirements
                                        $totalRequirements = $job->count();
                                        $passedRequirements = 0;

                                        // Count how many passed
                                        foreach ($job as $requirement) {
                                            if (isset($applicantChecklist[$requirement->requirement])
                                                && strtoupper($applicantChecklist[$requirement->requirement]) === 'YES') {
                                                $passedRequirements++;
                                            }
                                        }

                                        // Determine if all requirements met
                                        $allMet = ($totalRequirements > 0 && $passedRequirements === $totalRequirements);
                                    @endphp
                                    <tr>
                                        <td>{{ $user->lname ?? '-' }}</td>
                                        <td>{{ $user->fname ?? '-' }}</td>
                                        <td>{{ $user->oname ?? '-' }}</td>
                                        <td class="text-center">
                                            @if($user->is_disabled || strtolower($user->disability) === 'yes')
                                                <span class="label label-info">Yes</span>
                                                @if($user->disability && strtolower($user->disability) !== 'yes' && strtolower($user->disability) !== 'no')
                                                    <br><small class="text-muted">{{ $user->disability }}</small>
                                                @endif
                                            @else
                                                <span class="label label-default">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $user->dob ?? '-' }}</td>
                                        <td class="text-center">{{ $user->phone_no ?? '-' }}</td>
                                        <td>{{ $user->po_box ?? '-' }}</td>
                                        <td class="text-center">{{ $user->postal_code ?? '-' }}</td>
                                        <td>{{ $user->email ?? '-' }}</td>
                                        <td>{{ $user->current_employer ?? '-' }}</td>
                                        <td>{{ $user->current_position ?? '-' }}</td>

                                        @foreach ($job as $jb)
                                            @php
                                                $status = $applicantChecklist[$jb->requirement] ?? null;
                                            @endphp
                                            <td class="text-center">
                                                @if(strtoupper($status) === 'YES')
                                                    <span class="label label-success">
                                                        <i class="fa fa-check"></i> Yes
                                                    </span>
                                                @elseif(strtoupper($status) === 'NO')
                                                    <span class="label label-danger">
                                                        <i class="fa fa-times"></i> No
                                                    </span>
                                                @else
                                                    <span class="label label-default">
                                                        <i class="fa fa-minus"></i> -
                                                    </span>
                                                @endif
                                            </td>
                                        @endforeach

                                        <td class="text-center" style="font-weight:bold; background:{{ $allMet ? '#d4edda' : '#f8d7da' }};">
                                            @if($allMet)
                                                <span style="color:#155724; font-weight:bold; font-size:12px;">
                                                    <i class="fa fa-check-circle"></i> Met
                                                </span>
                                            @else
                                                <span style="color:#721c24; font-weight:bold; font-size:12px;">
                                                    <i class="fa fa-times-circle"></i> Not Met
                                                    <br><small>({{ $passedRequirements }}/{{ $totalRequirements }})</small>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>
                @else
                    <div class="text-center text-muted" style="padding:40px 20px;">
                        <i class="fa fa-filter fa-3x"></i>
                        <h4 style="margin-top:15px;">No results yet</h4>
                        <p>Please select a job position from the dropdown above and click "Click To Filter" to view checklist results.</p>
                    </div>
                @endif
                </div>
           </div>
       </div>
     </div>
   </div>

<script type="text/javascript">
  $(document).ready(function() {
    @if(!empty($data) && count($data) > 0)
      var table = $('#report-table').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        scrollX: true,
        fixedColumns: {
          leftColumns: 3
        },
        dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
             '<"row"<"col-sm-12"B>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
          {
            extend: 'excel',
            text: '<i class="fa fa-file-excel-o"></i> Export to Excel',
            className: 'btn btn-success btn-sm',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdf',
            text: '<i class="fa fa-file-pdf-o"></i> Export to PDF',
            className: 'btn btn-danger btn-sm',
            orientation: 'landscape',
            pageSize: 'A3',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'print',
            text: '<i class="fa fa-print"></i> Print',
            className: 'btn btn-primary btn-sm',
            exportOptions: {
              columns: ':visible'
            }
          }
        ],
        language: {
          processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw text-primary"></i> Loading...',
          emptyTable: '<i class="fa fa-inbox fa-2x text-muted"></i><br>No checklist data available.',
          zeroRecords: '<i class="fa fa-search fa-2x text-muted"></i><br>No matching records found.'
        }
      });
    @endif
  });
</script>

@endsection
