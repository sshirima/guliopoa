<div class="form-group has-feedback">
    <input type="text" value="{{isset($category) ? $category[\App\Models\Category::COLUMN_NAME] : old(\App\Models\Category::COLUMN_NAME)}}" name="{{\App\Models\Category::COLUMN_NAME}}" class="form-control" placeholder="{{__('admin_page_categories.field_placeholder_name')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>

<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($category) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">