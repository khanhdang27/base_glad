@extends("Base::backend.master")

@section("content")
    <div class="setting-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans('Setting') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('Setting') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row listing">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ trans('Email Setting') }}</h3>
                        <p class="card-text">{{ trans('To configuration the site email and SMTP.') }}</p>
                        <a href="{{ route("get.setting.emailConfig") }}"
                           class="btn btn-success">{{ trans('Go to config') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ trans('Website Setting') }}</h3>
                        <p class="card-text">{{ trans('To configuration the website.') }}</p>
                        <a href="#"
                           class="btn btn-success">{{ trans('Go to config') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
