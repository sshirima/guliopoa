<div class="form-group has-feedback">
    @if(isset($productAttribute))
        <input type="text" disabled value="{{isset($productAttribute) ? $productAttribute[\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_CODE] : old(\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_CODE)}}" name="{{\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_CODE}}" class="form-control" placeholder="{{__('admin_page_product_attributes.field_placeholder_code')}}">
    @else
        <input type="text" value="{{old(\App\Models\Currency::COLUMN_CODE)}}" name="{{\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_CODE}}" class="form-control" placeholder="{{__('admin_page_product_attributes.field_placeholder_code')}}">
    @endif
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($productAttribute) ? $productAttribute[\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_NAME] : old(\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_NAME)}}" name="{{\App\Models\ProductAttribute::COLUMN_ATTRIBUTE_NAME}}" class="form-control" placeholder="{{__('admin_page_product_attributes.field_placeholder_name')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($productAttribute) ? $productAttribute[\App\Models\ProductAttribute::COLUMN_DESCRIPTION] : old(\App\Models\ProductAttribute::COLUMN_DESCRIPTION)}}" name="{{\App\Models\ProductAttribute::COLUMN_DESCRIPTION}}" class="form-control" placeholder="{{__('admin_page_product_attributes.field_placeholder_description')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    {{Form::select(\App\Models\ProductAttribute::COLUMN_TYPE,$attributeTypes,isset($productAttribute)?array_search($productAttribute[\App\Models\ProductAttribute::COLUMN_TYPE],\App\Models\ProductAttribute::DEFAULT_TYPES)+1:null,['class'=>'form-control select2 select2-hidden-accessible'])}}
</div>
<div class="form-group has-feedback">


</div>

<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($productAttribute) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">