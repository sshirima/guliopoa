<div class="panel panel-default">
    <div class="panel-heading">
        <h4 >{{__('admin_page_sellers.content_body_field_panel_heading_account_title')}}</h4>
    </div>
    <div class="panel-body">
        <div class="form-group has-feedback">

            <input type="text" value="{{old(\App\Models\Merchant::COLUMN_FIRST_NAME)}}" name="{{\App\Models\Merchant::COLUMN_FIRST_NAME}}" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_first_name')}}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" value="{{old(\App\Models\Merchant::COLUMN_LAST_NAME)}}" name="{{\App\Models\Merchant::COLUMN_LAST_NAME}}" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_last_name')}}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" value="{{old(\App\Models\Merchant::COLUMN_EMAIL)}}" name="{{\App\Models\Merchant::COLUMN_EMAIL}}" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_email')}}">
            <span class="glyphicon glyphicon-email form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" value="{{old(\App\Models\Merchant::COLUMN_PHONE_NUMBER)}}" name="{{\App\Models\Merchant::COLUMN_PHONE_NUMBER}}" class="form-control" placeholder="{{__('admin_page_auth_register.placeholder_phone_number')}}">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="{{\App\Models\Merchant::COLUMN_PASSWORD}}" class="form-control" placeholder="{{__('admin_page_auth_login.placeholder_password')}}">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
    </div>
</div>