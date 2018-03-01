<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
</head>
<body>
@include('headerAndFooter.header')
@foreach ($batches as $batch)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                    Batch ID:{{$batch->id}}
                </h1>
            </div>
            <div id="no-more-tables">
                <table class="col-md-12 table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                    <tr>
                        <th>Yeast Name</th>
                        <th >Temperature Set</th>
                        <th >Run Time</th>
                        <th >Temperature Inside Average</th>
                        <th >Temperature Outside Average</th>
                        <th>Pressure Average</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$batch->name}}</td>
                        <td>{{$batch->tempSet}} F</td>
                        <td>{{$batch->created_at->diffInHours($information_inputs->where('batch_id',$batch->id)->last()->created_at) }} hours</td>
                        <td>{{$information_inputs->where('batch_id',$batch->id)->where('tempInside', '!=', 0)->avg('tempInside')}} F</td>
                        <td>{{$information_inputs->where('batch_id',$batch->id)->where('tempInside', '!=', 0)->avg('tempOutside')}} F</td>
                        <td>{{$information_inputs->where('batch_id',$batch->id)->where('tempInside', '!=', 0)->avg('pressure')}} ATM</td>
                    </tr>
                    </tbody>
                </table>
                <canvas id="myChart{{$batch->id}}"  width="1000" height="500"></canvas>
                <script>
                    ctx = document.getElementById("myChart" + "{!! json_encode($batch->id) !!}");
                    //console.log({!! json_encode($information_inputs) !!});
                    var arraysize = "{!! (json_encode($information_inputs->count())) !!}";
                    //console.log(arraysize);
                    var array1 = [{!! json_encode($information_inputs) !!}];
                    var temps = [];
                    var temps0 = [];
                    var time = [];
                    var j = 0;
                    var temp_set = [];
                    for(var i =0;i<arraysize;i++){
                        if(array1[0][i]['batch_id'] == "{!! json_encode($batch->id) !!}" && array1[0][i]['tempInside'] != null){
                            temps[j] = array1[0][i]['tempInside'];
                            temps0[j] = array1[0][i]['tempOutside'];
                            time[j] =  array1[0][i]['created_at'];
                            temp_set[j] = [{!! (json_encode($batch->tempSet)) !!}];
                            j++;
                        }
                    }

                    j = 0;
                    let myChart{!! json_encode($batch->id) !!} = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: time,
                            datasets: [{
                                boarderColor:'00FF00',
                                boarderWidth:'4',
                                label: 'Temperature Inside',
                                data: temps,
                                "fill":false,
                                "borderColor":"rgb(75, 192, 192)",
                            },
                                {
                                    boarderColor:'00FF00',
                                    boarderWidth:'4',
                                    label: 'Temperature Set',
                                    data: temp_set,
                                    "fill":false,
                                    "borderColor":"rgb(45, 92, 192)"
                                },
                                {
                                    boarderColor:'00FF00',
                                    boarderWidth:'4',
                                    label: 'Temperature Outside',
                                    data: temps0,
                                    "fill":false,
                                    "borderColor":"rgb(192, 48, 100)",
                                }],
                        },
                        options: {
                            responsive: true,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: false
                                    }
                                }]
                            }
                        }
                    });
                </script>
                <canvas id="my0Chart{{$batch->id}}" width="1000" height="500"></canvas>
                <script>
                    ctx = document.getElementById("my0Chart" + "{!! json_encode($batch->id) !!}");
                    //console.log({!! json_encode($information_inputs) !!});
                    var arraysize = "{!! (json_encode($information_inputs->count())) !!}";
                    //console.log(arraysize);
                    var array1 = [{!! json_encode($information_inputs) !!}];
                    var temps = [];
                    var temps0 = [];
                    var time = [];
                    var j = 0;
                    var temp_set = [];
                    for(var i =0;i<arraysize;i++){
                        if(array1[0][i]['batch_id'] == "{!! json_encode($batch->id) !!}" && array1[0][i]['tempInside'] != null){
                            temps[j] = array1[0][i]['pressure'];
                            temps0[j] = array1[0][i]['tempOutside'];
                            time[j] =  array1[0][i]['created_at'];
                            temp_set[j] = [{!! (json_encode($batch->tempSet)) !!}];
                            j++;
                        }
                    }

                    j = 0;
                    let my0Chart{!! json_encode($batch->id) !!} = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: time,
                            datasets: [{
                                boarderColor:'00FF00',
                                boarderWidth:'4',
                                label: 'Pressure',
                                data: temps,
                                "fill":false,
                                "borderColor":"rgb(125, 47, 88)",
                            },
                            ],
                        },
                        options: {
                            responsive: true,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: false
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
@endforeach
@include('headerAndFooter.footer')

</body>
</html>
