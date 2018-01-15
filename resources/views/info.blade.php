
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
</head>
<body>
@include('headerAndFooter.header')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="w3-container">
                <a href="/new" class="w3-btn w3-red" id="center">New Batch</a>
            </div>
            <h1 class="text-center">
                Current Batch Information
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
                    <th >Temperature Inside</th>
                    <th >Temperature Outside</th>
                    <th>Pressure</th>
                    <th>PH</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$current_batch->name}}</td>
                    <td>{{$current_information->done}}</td>
                    <td>{{$current_batch->tempSet}}</td>
                    <td>{{$current_information->runTime}}</td>
                    <td>{{$current_information->tempInside}}</td>
                    <td>{{$current_information->tempOutside}}</td>
                    <td>{{$current_information->pressure}}</td>
                    <td>{{$current_information->PH}}</td>
                </tr>
                </tbody>
            </table>
        </div>
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
                        label: 'Temperature',
                        data: [{!! json_encode($current_batch->tempSet) !!},
                            {!! json_encode($current_information->tempInside) !!},
                            {!! json_encode($current_information->tempOutside) !!}],
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
<br>
<br>

@include('headerAndFooter.footer')

</body>
</html>