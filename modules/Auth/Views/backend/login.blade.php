@extends('Auth::backend.master')

@section('content')
    <div class="login-register" style="background-image:url('https://wallpaperaccess.com/full/2581461.jpg');">
        <div class="login-box card">
            <div class="card-body">
                <form action="" class="form-horizontal form-material" method="post">
                    @csrf
                    <h3 class="box-title m-b-20">{{ trans('Sign In') }}</h3>
                    @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required placeholder="{{ trans('Email') }}" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required placeholder="{{ trans('Password') }}" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me" name="remember_me">
                                <label class="custom-control-label" for="remember-me">{{ trans('Remember me') }}</label>
                                <a href="{{ route("admin.get.forgot_password") }}" id="to-recover" class="text-dark pull-right">
                                    <i class="fa fa-lock m-r-5"></i> {{ trans('Forgot Password') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                    {{--<div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div>--}}
                </form>
            </div>
        </div>
    </div>
@endsection
