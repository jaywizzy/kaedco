<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<title>KAEDCO - Welcome</title>

    <link rel="icon" type="image/png" href="/creativetim/img/favicon.ico">
    <link href="/creativetim/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/creativetim/css/animate.min.css" rel="stylesheet"/>
    <link href="/creativetim/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="/creativetim/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/creativetim/css/pe-icon-7-stroke.css" rel="stylesheet" />
    @yield('stylesheets')

    <script src="/creativetim/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/creativetim/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/creativetim/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="/creativetim/js/bootstrap-notify.js"></script>
	<script src="/creativetim/js/light-bootstrap-dashboard.js"></script>
	<script src="/creativetim/js/demo.js"></script>
    @yield('scripts')

</head>
<body>
    <div class="wrapper">
        @include('tariff.sidebar')

        <div class="main-panel">
            @include('tariff.navbar')

            <div class="content">
                @yield('content')
            </div>

            @include('layouts.footer')

        </div>
    </div>
</body>
</html>
