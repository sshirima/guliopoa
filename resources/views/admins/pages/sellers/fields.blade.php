<div class="panel panel-default">
    <div class="panel-heading">
        <h4 >{{__('admin_page_sellers.content_body_field_panel_heading_seller_title')}}</h4>
    </div>
    <div class="panel-body">
        <div class="form-group has-feedback">
            @if(isset($seller))
                <input type="text" disabled value="{{$seller[\App\Models\Seller::COLUMN_SELLER_NAME]}}" name="{{\App\Models\Seller::COLUMN_SELLER_NAME}}" class="form-control" placeholder="{{__('admin_page_sellers.field_placeholder_name')}}">
            @else
                <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
                <input type="text" value="{{old(\App\Models\Seller::COLUMN_SELLER_NAME)}}" name="{{\App\Models\Seller::COLUMN_SELLER_NAME}}" class="form-control" placeholder="{{__('admin_page_sellers.field_placeholder_name')}}">
                <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
            @endif

        </div>
        <div class="form-group has-feedback">
            <input type="text" value="{{isset($seller) ? $seller[\App\Models\Seller::COLUMN_DESCRIPTION] : old(\App\Models\Seller::COLUMN_DESCRIPTION)}}" name="{{\App\Models\Seller::COLUMN_DESCRIPTION}}" class="form-control" placeholder="{{__('admin_page_sellers.field_placeholder_description')}}">
            <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {{Form::select(\App\Models\Seller::COLUMN_SELLER_GROUP_ID,$sellerGroupsArray,isset($seller)?$seller[\App\Models\Seller::COLUMN_SELLER_GROUP_ID]:null,['class'=>'form-control select2 select2-hidden-accessible'])}}
        </div>
    </div>
</div>
<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($seller) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">