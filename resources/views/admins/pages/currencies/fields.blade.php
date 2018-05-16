<div class="form-group has-feedback">
    @if(isset($currency))
        <input type="text" disabled value="{{isset($currency) ? $currency[\App\Models\Currency::COLUMN_CODE] : old(\App\Models\Currency::COLUMN_CODE)}}" name="{{\App\Models\Currency::COLUMN_CODE}}" class="form-control" placeholder="{{__('admin_page_currencies.field_placeholder_code')}}">
    @else
        <input type="text" value="{{old(\App\Models\Currency::COLUMN_CODE)}}" name="{{\App\Models\Currency::COLUMN_CODE}}" class="form-control" placeholder="{{__('admin_page_currencies.field_placeholder_code')}}">
    @endif
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>

<div class="form-group has-feedback">
    <input type="text" value="{{isset($currency) ? $currency[\App\Models\Currency::COLUMN_DESCRIPTION] : old(\App\Models\Currency::COLUMN_DESCRIPTION)}}" name="{{\App\Models\Currency::COLUMN_DESCRIPTION}}" class="form-control" placeholder="{{__('admin_page_currencies.field_placeholder_description')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>

<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($currency) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">