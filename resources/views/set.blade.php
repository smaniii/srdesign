<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Website Font style -->
    <script src="https://use.fontawesome.com/752ce7a84f.js"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('css/form.css')}}">
</head>
<body>
@include('headerAndFooter.header')
<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h5>Set Batch Specifications</h5>
            <form method="post" action="/set">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Set Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Yeast Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Set Temperature</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-thermometer-full" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="temperature"  placeholder="Enter Temperature"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Set Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email"  placeholder="Enter email"/>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-info" value="Submit">

            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
@include('headerAndFooter.footer')

</body>
</html>