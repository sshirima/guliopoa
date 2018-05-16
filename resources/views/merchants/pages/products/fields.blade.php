<div class="row">
    <div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">{{__('merchant_page_products.field_title_product_details')}}</h3>
            </div>
            <div class="box-body">
                <div class="form-group col-sm-12 has-feedback">
                    <input type="text"
                           value="{{isset($product) ? $product[\App\Models\Product::COLUMN_PRODUCT_NAME] : old(\App\Models\Product::COLUMN_PRODUCT_NAME)}}"
                           name="{{\App\Models\Product::COLUMN_PRODUCT_NAME}}" class="form-control"
                           placeholder="{{__('merchant_page_products.field_placeholder_product_name')}}">
                </div>
                <div class="form-group col-sm-12">
                    <label>{{__('merchant_page_products.field_label_category')}}</label>
                    {{Form::select(\App\Models\Product::REL_SUBCATEGORIES.'[]',$subCategories,null,['class'=>'form-control select2 select2-hidden-accessible',
                    'style'=>'width: 100%;','multiple'])}}
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label" for="Date">{{__('merchant_page_products.field_label_expiry_date')}}</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <input type="text" class="form-control" id="{{\App\Models\Product::COLUMN_EXPIRE_DATE}}" name="{{\App\Models\Product::COLUMN_EXPIRE_DATE}}"/>
                    </div>
                </div>
                <div class="form-group  col-sm-6">
                    <label class="control-label" for="Date">{{__('merchant_page_products.field_label_product_images')}}</label>
                    <input type="file" name="{{\App\Models\Product::REL_PRODUCT_IMAGES.'[]'}}" multiple>
                    <p class="help-block">{{__('merchant_page_products.field_label_product_images_max')}}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label>{{__('merchant_page_products.field_label_product_types')}}</label>
                    {{Form::select(\App\Models\Product::COLUMN_PRODUCT_TYPE,$productTypes,array_search($type,\App\Models\Product::DEFAULT_TYPES),['class'=>'form-control select2 select2-hidden-accessible',
                    'style'=>'width: 100%;'])}}
                </div>
            </div>
        </div>﻿
    </div>
    <div class="col-sm-7">
        <div class="box box-success">
            <div class="box-header"> <h3 class="box-title">{{__('merchant_page_products.field_title_product_description')}}</h3></div>
            <div class="box-body pad">
                <div class="form-group col-sm-12">
                    <textarea class="textarea" id="{{\App\Models\Product::COLUMN_PRODUCT_DESCRIPTION}}" name="{{\App\Models\Product::COLUMN_PRODUCT_DESCRIPTION}}"
                              style="width: 100%;padding: 10px"
                              placeholder="Enter text ..."></textarea>
                </div>
                <div class="form-group col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($product) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </div>
</div>
