<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <link href="{{ asset('assets/backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/dist/css/pages/error-pages.css') }}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue fixed-layout">
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>404</h1>
            <h3 class="text-uppercase">{{ trans('FORBIDDEN ERROR!') }}</h3>
            <p class="text-muted m-t-30 m-b-30">{{ trans("YOU DON'T HAVE PERMISSION TO ACCESS ON THIS FEATURE.") }}</p>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">{{ trans('Back to home') }}</a> </div>

    </div>
</section>
<script src="{{ asset("assets/backend/node_modules/jquery/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/popper/popper.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/waves.js") }}"></script>
</body>

</html>
