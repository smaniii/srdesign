<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">
    <script src="{{ URL::asset('js/chart.js/dist/Chart.js')}}"></script>
</head>
<body>
@include('headerAndFooter.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Batch ID:1
            </h1>
        </div>
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
                <thead class="cf">
                <tr>
                    <th>Yeast Name</th>
                    <th>Done</th>
                    <th >Temperature Set</th>
                    <th >Run Time</th>
                    <th >Temperature Inside Average</th>
                    <th >Temperature Outside Average</th>
                    <th>Pressure Average</th>
                    <th>PH Average</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>XYZ Yeast</td>
                    <td>Yes</td>
                    <td>70F</td>
                    <td>8 days</td>
                    <td>68F</td>
                    <td>69F</td>
                    <td>1.4 atm</td>
                    <td>7</td>
                </tr>
                </tbody>
            </table>
            <canvas id="myChart" width="500" height="400"></canvas>
            <script>
                const ctx = document.getElementById("myChart");
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Temperature Set", "Temperature Inside", "Temperature Outside"],
                        datasets: [{
                            boarderColor:'00FF00',
                            boarderWidth:'4',
                            label: 'Temperature Averages',
                            data: [70, 68, 69],
                        }]
                    },
                    options: {
                        responsive: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Batch ID:2
            </h1>
        </div>
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
                <thead class="cf">
                <tr>
                    <th>Yeast Name</th>
                    <th>Done</th>
                    <th >Temperature Set</th>
                    <th >Run Time</th>
                    <th >Temperature Inside Average</th>
                    <th >Temperature Outside Average</th>
                    <th>Pressure Average</th>
                    <th>PH Average</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>XYZ Yeast</td>
                    <td>No</td>
                    <td>70F</td>
                    <td>2 days</td>
                    <td>68F</td>
                    <td>69F</td>
                    <td>1.4 atm</td>
                    <td>7</td>
                </tr>
                </tbody>
            </table>
            <canvas id="myChart0" width="500" height="400"></canvas>
            <script>
                const ctr = document.getElementById("myChart0");
                let myChart0 = new Chart(ctr, {
                    type: 'bar',
                    data: {
                        labels: ["Temperature Set", "Temperature Inside", "Temperature Outside"],
                        datasets: [{
                            boarderColor:'00FF00',
                            boarderWidth:'4',
                            label: 'Temperature Averages',
                            data: [70, 68, 69],
                        }]
                    },
                    options: {
                        responsive: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
<br>
<br>
@include('headerAndFooter.footer')

</body>
</html>
