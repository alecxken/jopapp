<!-- <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="#" class="box bg-aqua"><span class="info-box-icon bg-aqua"><i class="fa fa-sliders"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text"><b>AML/CFL</b></span>
                <span class="info-box-text">Queue
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-success">5</span> </a>
                </span>
                <span class="info-box-text">Pending Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-warning">{{$sanctions -1}}+</span> </a>
                </span>
                <span class="info-box-text">Complete Request
                    <a href="{{url('compliance')}}" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-danger">{{\App\Search::all()->where('status','Wait')->count()}}</span> </a>
                </span>

            </div>


        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-spinner"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Compliance</b></span>
                <span class="info-box-text">Complete Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-success">5</span> </a>
                </span>
                <span class="info-box-text">Pending Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-warning">20+</span> </a>
                </span>
                <span class="info-box-text">New Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-danger">10+</span> </a>
                </span>
            </div>
        </div>
    </div>



    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Risk Management</b></span>
                <span class="info-box-text">Complete Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-success">5</span> </a>
                </span>
                <span class="info-box-text">Pending Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-warning">20+</span> </a>
                </span>
                <span class="info-box-text">New Request
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="label label-danger">10+</span> </a>
                </span>
            </div>
        </div>
    </div>


    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">

            <span class="info-box-icon bg-navy"><i class="fa fa-pie-chart"></i></span>

            <div class="pull-right btn-group-vertical">

                    <label class="label label-danger label-flat"><i class="fa fa-align-align-left">2+</i></label>
                    <label class="label label-success label-flat"><i class="fa fa-align-center">6+</i></label>
                    <label  class="label label-warning label-flat"><i class="fa fa-align-right">6+</i></label>

              </div>

        </div>
    </div>


</div> -->
@role('Compliance')

<div class="row">
    <div class="col-md-6">
        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Risk Management</h3>
                <div class="box-tools pull-right">
                    <label class="label label-danger label-flat">2+</label>
                    <label class="label label-success label-flat">6+</label>
                    <label class="label label-warning label-flat">6+</label>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <div class="btn-group">

                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


                <div class="table-responsive">
                    <table class="table table-stripped">
                        @if(!empty($sadata))
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Module</th>
                                <th>Issue</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sadata as $user)
                            <tr>
                                <td><a href="">#{{$user->token}}</a></td>
                                <td>Sanctions</td>
                                <td>{{$user->matches}}</td>
                                <td>
                                    <a href="{{url('compliance-action/'.$user->token.'/stop')}}" class="label label-danger">Stop</a>
                                    <a href="{{url('compliance-action/'.$user->token.'/proceed')}}" class="label label-success">Proceed</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        @endif
                        @if(!empty($strdata))
                        <!-- <thead>
                  <tr>
                    <th>Id</th>
                    <th>Module</th>
                     <th>Issue</th>
                    <th>Action</th>
                  </tr>
                  </thead> -->
                        <tbody>
                            @foreach($strdata as $user)
                            <tr>
                                <td><a href="">#{{$user->ref_no}}</a></td>
                                <td>Reported STR</td>
                                <td>{{$user->customer}}-{{$user->customer_ac}}</td>
                                <td>
                                    <a href="{{url('viewstrdetails/'.$user->ref_no)}}" class="label label-danger">View Details</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        @endif
                        @if(!empty($cadata))

                    </table>
                </div>

                <!-- /.row -->
            </div>


        </div>
        <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">AML/CFT</h3>

                <div class="box-tools pull-right">
                    <label class="label label-danger label-flat">2+</label>
                    <label class="label label-success label-flat">6+</label>
                    <label class="label label-warning label-flat">6+</label>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <div class="btn-group">

                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Module</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cadata as $case)
                            <tr>
                                <td>#{{$case->ref_token}}</td>
                                <td>Case</td>
                                {{-- <td>{{\App\User::all()->where('id',$case->assignee)->first()->username}}</td> --}}
                                <td>
                                    @switch ($case->status)

                                    @case('created')
                                    <span class="label label-warning"> MLRO</span>
                                    @break

                                    @case('request')
                                    <span class="label label-danger"> Assignee</span>
                                    @break

                                    @case('response')
                                    <span class="label label-info"> Compliance</span>
                                    @break

                                    @case('ok')
                                    <span class="label label-success"> MLRO-(STR)</span>
                                    @break

                                    @endswitch
                                </td>
                                <td>
                                    <a href="" class="label label-default">View More</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="box box-danger collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Compliance</h3>

                <div class="box-tools pull-right">
                    <label class="label label-danger label-flat">2+</label>
                    <label class="label label-success label-flat">6+</label>
                    <label class="label label-warning label-flat">6+</label>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <div class="btn-group">

                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Module</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box box-success collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Risk Management</h3>

                <div class="box-tools pull-right">
                    <label class="label label-danger label-flat">2+</label>
                    <label class="label label-success label-flat">6+</label>
                    <label class="label label-warning label-flat">6+</label>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <div class="btn-group">

                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Module</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Calendar -->
        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <i class="fa fa-calendar"></i>

                <h3 class="box-title">Calendar</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Add new event</a></li>
                            <li><a href="#">Clear events</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View calendar</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Progress bars -->
                        <div class="clearfix">
                            <span class="pull-left">Task #1</span>
                            <small class="pull-right">90%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">Task #2</span>
                            <small class="pull-right">70%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="clearfix">
                            <span class="pull-left">Task #3</span>
                            <small class="pull-right">60%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">Task #4</span>
                            <small class="pull-right">40%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.box -->
    </div>

</div>
@role('MLRO')
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Executive Summary</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <div class="btn-group">

                    </div>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class=" box box-success col-md-6">

                    <?php
 $social_users=\App\Search::selectRaw('count(type) as count,type')->groupBy('type')->get();
         $user=array();
         foreach ($social_users as $result) {
             $user[ \DB::table('searches')->where('type', $result->type)->first()->type]=(int)$result->count;
         }

 $social=\App\Search::selectRaw('count(status) as count,type')->groupBy('type')->get();
         $usera=array();
         foreach ($social as $result) {
             $usera[ \DB::table('searches')->where('type', $result->type)->first()->status]=(int)$result->count;
         }
   $task_people=\App\Task::selectRaw('count(status) as count,assignee')->groupBy('assignee')->get();
         $task=array();
         foreach ($task_people as $result) {
             $task[ \DB::table('tasks')->where('assignee', $result->assignee)->first()->status]=(int)$result->count;
         }



      $task_peoplea=\App\Task::selectRaw('count(status) as count,assignee')->groupBy('assignee')->get();
         $tasks=array();
         foreach ($task_peoplea as $result) {
             $tasks[ \DB::table('tasks')->where('assignee', $result->assignee)->first()->assignee]=(int)$result->count;
         }
  ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var record = {!!json_encode($user) !!
                            };
                            // console.log(record);
                            // Create our data table.
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'position');
                            data.addColumn('number', 'Total_Signup');
                            for (var k in record) {
                                var v = record[k];

                                data.addRow([k, v]);
                                // // console.log(v);
                            }
                            var options = {
                                title: 'Sanction Search Distribution',
                                is3D: true,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }

                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart4);

                        function drawChart4() {
                            var record = {!!json_encode($usera) !!
                            };
                            // console.log(record);
                            // Create our data table.
                            var dta = new google.visualization.DataTable();
                            dta.addColumn('string', 'position');
                            dta.addColumn('number', 'Total_Signup');
                            for (var k in record) {
                                var v = record[k];

                                dta.addRow([k, v]);
                                // console.log(v);
                            }
                            var options = {
                                title: 'Sanction  Distribution By Status',
                                is3D: true,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d7'));
                            chart.draw(dta, options);
                        }

                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart2);

                        function drawChart2() {
                            var record = {!!json_encode($task) !!
                            };
                            // console.log(record);
                            // Create our deta table.
                            var deta = new google.visualization.DataTable();
                            deta.addColumn('string', 'position');
                            deta.addColumn('number', 'Total_Signup');
                            for (var k in record) {
                                var v = record[k];

                                deta.addRow([k, v]);
                                // console.log(v);
                            }
                            var options = {
                                title: 'Task Distribution',
                                is3D: true,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
                            chart.draw(deta, options);
                        }

                        google.charts.setOnLoadCallback(drawChart2a);

                        function drawChart2a() {
                            var record = {!!json_encode($tasks) !!
                            };
                            // console.log(record);
                            // Create our deta table.
                            var deta2 = new google.visualization.DataTable();
                            deta2.addColumn('string', 'position');
                            deta2.addColumn('number', 'Total_Signup');
                            for (var k in record) {
                                var v = record[k];

                                deta2.addRow([k, v]);
                                // console.log(v);
                            }
                            var options = {
                                title: 'Task Distribution By person',
                                is3D: true,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2a'));
                            chart.draw(deta2, options);
                        }
                    </script>




                    <div class="row">
                        <div class="col-md-6">
                            <div id="piechart_3d"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart_3d7"></div>
                        </div>

                        <div class="col-md-6">
                            <div id="piechart_3d2"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart_3d2a"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endrole
@endrole
