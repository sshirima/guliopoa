<div class="form-group has-feedback">
    @if(isset($sellerGroup))
        <input type="text" disabled value="{{$sellerGroup[\App\Models\SellerGroup::COLUMN_GROUP_NAME]}}" name="{{\App\Models\SellerGroup::COLUMN_GROUP_NAME}}" class="form-control" placeholder="{{__('admin_page_seller_groups.field_placeholder_name')}}">
    @else
        <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
        <input type="text" value="{{old(\App\Models\SellerGroup::COLUMN_GROUP_NAME)}}" name="{{\App\Models\SellerGroup::COLUMN_GROUP_NAME}}" class="form-control" placeholder="{{__('admin_page_seller_groups.field_placeholder_name')}}">
        <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
    @endif

</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($sellerGroup) ? $sellerGroup[\App\Models\SellerGroup::COLUMN_DESCRIPTION] : old(\App\Models\SellerGroup::COLUMN_DESCRIPTION)}}" name="{{\App\Models\SellerGroup::COLUMN_DESCRIPTION}}" class="form-control" placeholder="{{__('admin_page_seller_groups.field_placeholder_description')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>

<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($sellerGroup) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">