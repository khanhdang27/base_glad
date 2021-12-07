@extends('Auth::backend.master')

@section('content')
    <div class="login-register" style="background-image:url(https://wallpaperaccess.com/full/1164874.jpg);">
        <div class="login-box card" style="width: 550px;">
            <div class="card-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>{{ trans('Recover Password') }}</h3>
                            @if (session('danger'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <p class="text-muted">{{ trans('Enter your registered email below, We will send you a new password') }}</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="text" required="" placeholder="{{ trans('Email') }}">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">{{ trans('Reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
