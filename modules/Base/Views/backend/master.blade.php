<!DOCTYPE html>
@php($locale = App::getLocale())
<html lang="{{ !empty($locale) ? $locale : 'en' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">--}}
    <title>Admin Page</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/node_modules/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/node_modules/toast-master/css/jquery.toast.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/node_modules/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datetimepicker/css/datetimepicker-custom.css') }}">
    {{-- Elfinder  --}}
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/elfinder/css/elfinder.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/elfinder/css/theme.css') }}">
    {{-- End Elfinder  --}}
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/printjs/print.min.css') }}">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body class="skin-blue fixed-layout">
{{--<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Please wait</p>
    </div>
</div>--}}
<div id="main-wrapper">
    @include('Base::backend.top_bar')
    @include('Base::backend.left_sidebar')
    <div class="page-wrapper">
        <div class="container-fluid">
            <input type="text" class="success-notification d-none" value="{{ session('success') ?? null }}">
            <input type="text" class="danger-notification d-none" value="{{ session('danger') ?? null }}">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset("assets/backend/node_modules/jquery/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/popper/popper.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/perfect-scrollbar.jquery.min.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/waves.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/select2/js/select2.full.min.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/sidebarmenu.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/custom.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/raphael/raphael-min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/morrisjs/morris.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/jquery-sparkline/jquery.sparkline.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/toast-master/js/jquery.toast.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/dropify/dist/js/dropify.min.js") }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js') }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') }}"></script>
<script src="{{ asset("assets/backend/jquery/main.js") }}"></script>
<script src="{{ asset("assets/backend/jquery/modal.js") }}"></script>
<script src="{{ asset('assets/plugins/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }} "></script>
<script src="{{ asset('assets/plugins/printjs/print.min.js') }}"></script>
{{-- Elfinder  --}}
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins/elfinder/js/elfinder.full.js') }}"></script>
<script src="{{ asset('assets/plugins/elfinder/js/i18n/elfinder.zh_TW.js') }}"></script>
<script src="{{ asset('assets/plugins/elfinder/js/i18n/elfinder.zh_CN.js') }}"></script>
{{-- End Elfinder  --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script !src="">
    $(document).ready(function () {
        $(".select2").select2();

        notificationAlert();
    });

    if($('#ckeditor').length > 0){
        var editor = CKEDITOR.replace( 'ckeditor' , {
            language: "{{ App::getLocale() }}".toLowerCase(),
            height: 600
        });
    }
    /** Show file manager */
    $(document).on('dblclick', '.cke_dialog_image_url', function () {
        openElfinder($(this), '{{ route("elfinder.connector") }}', '{{ asset("packages/barryvdh/elfinder/sounds") }}', '{{ csrf_token() }}');
    });
    $(document).on('click', '.btn-elfinder', function () {
        openElfinder($(this), '{{ route("elfinder.connector") }}', '{{ asset("packages/barryvdh/elfinder/sounds") }}', '{{ csrf_token() }}');
    });
</script>
@stack('js')
</body>

</html>
