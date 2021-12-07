<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
{{--    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">--}}
    <title>Admin Page</title>
    <link href="{{ asset('assets/backend/dist/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/dist/css/style.min.css') }}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body class="skin-blue card-no-border">
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite admin</p>
    </div>
</div>
<section id="wrapper">
    @yield('content')
</section>
<script src="{{ asset("assets/backend/node_modules/jquery/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/popper/popper.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>

</body>

</html>
