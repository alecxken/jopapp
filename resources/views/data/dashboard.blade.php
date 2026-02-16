@extends('layouts.template')

@section('content')

<div class="content">
    <!-- Basic User View - Minimal Info Boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-globe"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jobs</span>
                    <span class="info-box-number">{{ $jobs ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Applicants</span>
                    <span class="info-box-number">{{ $jobapp ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-check-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Today's Applications</span>
                    <span class="info-box-number">{{ $todayApps ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Active Jobs</span>
                    <span class="info-box-number">{{ $activeJobs ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin/Reports Role - Extended Dashboard -->
    @role('Reports|Admin')

    <!-- Additional Info Boxes for Admin -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-hourglass-half"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending Applications</span>
                    <span class="info-box-number">{{ $pendingApps ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-check-square"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Completed Applications</span>
                    <span class="info-box-number">{{ $completedApps ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-calendar-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">This Week</span>
                    <span class="info-box-number">{{ $thisWeek ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa fa-line-chart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Avg per Job</span>
                    <span class="info-box-number">{{ $avgPerJob ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <!-- Application Status Breakdown -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Application Status Breakdown</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-application-status" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-status" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- Applications by Job -->
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Applications by Job Position</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-applications-by-job" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-job" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Applications Timeline -->
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Applications Timeline (Last 30 Days)</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-applications-timeline" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-timeline" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Geographic Distribution -->
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Geographic Distribution (By County)</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-geographic-distribution" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-geo" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- Gender Distribution -->
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Gender Distribution</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-gender-distribution" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-gender" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Data Entry Productivity -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Data Entry Productivity</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-data-entry-productivity" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-productivity" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- Education Distribution -->
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Education Level Distribution</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-education-distribution" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-education" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Salary Expectations -->
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Salary Expectations Analysis</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-salary-expectations" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-salary" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- Top Applicants -->
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Top Applicants by Score</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-top-applicants" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-top" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Age Distribution -->
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Age Distribution</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-age-distribution" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-age" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- Experience Distribution -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Experience Distribution</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-experience-distribution" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-experience" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Monthly Trends -->
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Monthly Application Trends (Last 12 Months)</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-monthly-trends" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-monthly" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

        <!-- Disability Statistics -->
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Disability Statistics</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart-disability-stats" style="min-height: 300px;"></div>
                </div>
                <div class="overlay" id="loader-disability" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    @endrole
</div>

@role('Reports|Admin')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script nonce="{{ $cspNonce ?? '' }}">
$(document).ready(function() {
    // Base URL for API
    const apiBase = '/api/dashboard';

    // Chart configuration defaults
    Highcharts.setOptions({
        colors: ['#3c8dbc', '#00a65a', '#f39c12', '#dd4b39', '#605ca8', '#39cccc', '#00c0ef', '#d81b60'],
        chart: {
            style: {
                fontFamily: 'Source Sans Pro, sans-serif'
            }
        },
        credits: {
            enabled: false
        }
    });

    // Function to load chart data
    function loadChart(endpoint, containerId, loaderId, chartConfig) {
        $('#' + loaderId).show();

        $.ajax({
            url: apiBase + endpoint,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#' + loaderId).hide();
                chartConfig.series = data.series || [];
                if (data.categories) {
                    chartConfig.xAxis = chartConfig.xAxis || {};
                    chartConfig.xAxis.categories = data.categories;
                }
                Highcharts.chart(containerId, chartConfig);
            },
            error: function(xhr, status, error) {
                $('#' + loaderId).hide();
                $('#' + containerId).html('<p class="text-center text-danger">Failed to load chart data</p>');
                console.error('Chart load error:', error);
            }
        });
    }

    // Application Status Breakdown (Pie Chart)
    loadChart('/application-status', 'chart-application-status', 'loader-status', {
        chart: { type: 'pie' },
        title: { text: null },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f}%'
                }
            }
        }
    });

    // Applications by Job (Bar Chart)
    loadChart('/applications-by-job', 'chart-applications-by-job', 'loader-job', {
        chart: { type: 'bar' },
        title: { text: null },
        xAxis: { title: { text: 'Job Position' } },
        yAxis: { title: { text: 'Number of Applications' } },
        tooltip: {
            valueSuffix: ' applications'
        }
    });

    // Applications Timeline (Line Chart)
    loadChart('/applications-timeline', 'chart-applications-timeline', 'loader-timeline', {
        chart: { type: 'areaspline' },
        title: { text: null },
        xAxis: { title: { text: 'Date' } },
        yAxis: { title: { text: 'Applications' } },
        tooltip: {
            valueSuffix: ' applications'
        }
    });

    // Geographic Distribution (Bar Chart)
    loadChart('/geographic-distribution', 'chart-geographic-distribution', 'loader-geo', {
        chart: { type: 'column' },
        title: { text: null },
        xAxis: {
            title: { text: 'County' },
            labels: { rotation: -45 }
        },
        yAxis: { title: { text: 'Number of Applicants' } },
        tooltip: {
            valueSuffix: ' applicants'
        }
    });

    // Gender Distribution (Pie Chart)
    loadChart('/gender-distribution', 'chart-gender-distribution', 'loader-gender', {
        chart: { type: 'pie' },
        title: { text: null },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f}%'
                }
            }
        }
    });

    // Data Entry Productivity (Bar Chart)
    loadChart('/data-entry-productivity', 'chart-data-entry-productivity', 'loader-productivity', {
        chart: { type: 'bar' },
        title: { text: null },
        xAxis: { title: { text: 'User' } },
        yAxis: { title: { text: 'Applications Entered' } },
        tooltip: {
            valueSuffix: ' applications'
        }
    });

    // Education Distribution (Pie Chart)
    loadChart('/education-distribution', 'chart-education-distribution', 'loader-education', {
        chart: { type: 'pie' },
        title: { text: null },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}'
                }
            }
        }
    });

    // Salary Expectations (Column Chart)
    loadChart('/salary-expectations', 'chart-salary-expectations', 'loader-salary', {
        chart: { type: 'column' },
        title: { text: null },
        xAxis: { title: { text: 'Salary Range' } },
        yAxis: { title: { text: 'Number of Applicants' } },
        tooltip: {
            valueSuffix: ' applicants'
        }
    });

    // Top Applicants (Bar Chart)
    loadChart('/top-applicants', 'chart-top-applicants', 'loader-top', {
        chart: { type: 'bar' },
        title: { text: null },
        xAxis: { title: { text: 'Applicant' } },
        yAxis: {
            title: { text: 'Score (%)' },
            max: 100
        },
        tooltip: {
            valueSuffix: '%'
        }
    });

    // Age Distribution (Column Chart)
    loadChart('/age-distribution', 'chart-age-distribution', 'loader-age', {
        chart: { type: 'column' },
        title: { text: null },
        xAxis: { title: { text: 'Age Group' } },
        yAxis: { title: { text: 'Number of Applicants' } },
        tooltip: {
            valueSuffix: ' applicants'
        }
    });

    // Experience Distribution (Column Chart)
    loadChart('/experience-distribution', 'chart-experience-distribution', 'loader-experience', {
        chart: { type: 'column' },
        title: { text: null },
        xAxis: { title: { text: 'Experience Level' } },
        yAxis: { title: { text: 'Number of Applicants' } },
        tooltip: {
            valueSuffix: ' applicants'
        }
    });

    // Monthly Trends (Area Chart)
    loadChart('/monthly-trends', 'chart-monthly-trends', 'loader-monthly', {
        chart: { type: 'area' },
        title: { text: null },
        xAxis: { title: { text: 'Month' } },
        yAxis: { title: { text: 'Applications' } },
        tooltip: {
            valueSuffix: ' applications'
        }
    });

    // Disability Statistics (Pie Chart)
    loadChart('/disability-stats', 'chart-disability-stats', 'loader-disability', {
        chart: { type: 'pie' },
        title: { text: null },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b> ({point.percentage:.1f}%)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f}%'
                }
            }
        }
    });
});
</script>
@endrole

@endsection
