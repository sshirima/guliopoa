@extends('merchants.layouts.master-auth')

@section('title')
    {{__('merchant_page_auth_register.page_title')}}
@endsection

@section('content-body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{route('merchant.register')}}"><b>{{__('merchant_page_auth_login.merchant')}}</b> {{__('merchant_page_auth_login.panel')}}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{__('merchant_page_auth_register.form_title')}}</p>

            <form action="{{route('merchant.register.submit')}}" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="first_name" class="form-control" placeholder="{{__('merchant_page_auth_register.placeholder_first_name')}}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="last_name" class="form-control" placeholder="{{__('merchant_page_auth_register.placeholder_last_name')}}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="{{__('merchant_page_auth_register.placeholder_email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="phone_number" class="form-control" placeholder="{{__('merchant_page_auth_register.placeholder_phone_number')}}">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="{{__('merchant_page_auth_login.placeholder_password')}}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox">
                            <label class="icheckbox_square-blue" >
                                <input name="remember" type="checkbox" value="remember">
                                {{ __('merchant_page_auth_login.label_remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('auth.register')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

            <a href="{{route('merchant.login')}}" class="text-center">{{__('merchant_page_auth_register.already_member')}}</a>
        </div>
        <!-- /.form-box -->
    </div>
@endsection