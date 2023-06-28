@extends('laborant.layout.main')
@section('scanner')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- End of Page Heading -->

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Hello,</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$name = strtok(auth()->user()->employee->name, ',');}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Case</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{count($detectionHistory)}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Validated Case
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{count($validateHistory)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Unvalidated Case</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($unvalidateHistory)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Case Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="lineChart" style='center'></div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Successful Prediction Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="pieChart" style='center'></div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Success
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Failed
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        // Create the data table
        let data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Cases');

        // Add the data from the $data variable to the data table
        let patientData = {!! $data !!};
        patientData.forEach(function(item, index) {
            let month = new Date(null, index).toLocaleString('en', { month: 'long' });
            let count = item;
            data.addRow([month.toString(), count]);
        });

        // Set chart options
        let options = {
            curveType: 'function',
            legend: { position: 'bottom' },
            'height':345,
            vAxis: { title: 'Cases' }
        };

        // Instantiate and draw the chart
        let chart = new google.visualization.LineChart(document.getElementById('lineChart'));
        chart.draw(data, options);
    }
</script>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    const success = {{count($success)}};
    const failed = {{count($failed)}};

    function drawChart() {
        let data = google.visualization.arrayToDataTable([
            ['Task', 'Total'],
            ['Success',     success],
            ['Failed',      failed]
        ]);

        let options = {
            legend: 'none',
            'width':350,
            'height':300,
            colors: ['#1cc88a', '#e74a3b'],
        };

        let chart = new google.visualization.PieChart(document.getElementById('pieChart'));
        chart.draw(data, options);

        }
</script>
