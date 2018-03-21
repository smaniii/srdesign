
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td id="batch_name">{{$current_batch->name}}</td>
                    <td id="done">{{$is_done->done}}</td>
                    <td id="tempSet">{{$current_batch->tempSet}} F</td>
                    <td id="hours">{{$current_batch->created_at->diffInHours($current_information->where('batch_id',$current_batch->id)->get()->last()->created_at) }} hours</td>
                    <td id="tempInside">{{$current_information->tempInside}} F</td>
                    <td id="tempOutside">{{$current_information->tempOutside}} F</td>
                    <td id="pressure">{{$current_information->pressure}} ATM</td>
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
<script>
    $(document).ready(function(){
        setInterval(function(){
            $.get("https://school.dev/now", function(data, status){
            }).then(function (data) {
                document.getElementById('batch_name').innerHTML =data['current_batch']['name'];
                document.getElementById('hours').innerHTML =data['hours_diff'];
                document.getElementById('done').innerHTML =data['is_done']['done'];
                document.getElementById('tempSet').innerHTML =data['current_batch']['tempSet'];
                document.getElementById('tempInside').innerHTML =data['current_information']['tempInside'];
                document.getElementById('tempOutside').innerHTML =data['current_information']['tempOutside'];
                document.getElementById('pressure').innerHTML =data['current_information']['pressure'];
            });
        }, 10000);
    });
</script>

@include('headerAndFooter.footer')

</body>
</html>