<div class="form-group has-feedback">

    <input type="text" value="{{isset($adminAccount) ? $adminAccount->first_name : old('first_name')}}" name="first_name" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_first_name')}}">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($adminAccount) ? $adminAccount->last_name : old('last_name')}}" name="last_name" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_last_name')}}">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    @if(isset($adminAccount))
        <input type="email" value="{{$adminAccount->email}}" name="email" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_email')}}">
    @else
        <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_email')}}">
    @endif
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($adminAccount) ? $adminAccount->phone_number : old('phone_number')}}" name="phone_number" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_phone_number')}}">
    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" placeholder="{{__('admin_page_auth_login.placeholder_password')}}">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
</div>
<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($adminAccount) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">