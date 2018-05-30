<div class="row">
    <div class="col-sm-7">
        <ul class="timeline">
            <li class="time-label">
                <span class="bg-light-blue-active">Basic information</span>
            </li>
            <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">{{__('merchant_page_products.field_title_product_title')}}</h3>
                            @if (isset($product))
                                <span class="btn-sm bg-olive pull-right edit-title-modal"><i
                                            class="fas fa-pencil-alt"></i></span>
                            @endif
                        </div>
                        <div class="box-body pad">
                            <div class="form-group col-sm-12 has-feedback">
                                <input type="text"
                                       {{isset($product)?'disabled':''}}
                                       id="{{\App\Models\Product::COLUMN_PRODUCT_NAME}}"
                                       value="{{isset($product) ? $product[\App\Models\Product::COLUMN_PRODUCT_NAME] : old(\App\Models\Product::COLUMN_PRODUCT_NAME)}}"
                                       name="{{\App\Models\Product::COLUMN_PRODUCT_NAME}}" class="form-control"
                                       placeholder="{{__('merchant_page_products.field_placeholder_product_name')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <div class="box box-danger">

                        <div class="box-header">
                            <h3 class="box-title">{{__('merchant_page_products.field_title_product_description')}}</h3>
                        </div>
                        <div class="box-body pad">
                            <div class="form-group col-sm-12">
                    <textarea class="textarea" id="{{\App\Models\Product::COLUMN_PRODUCT_DESCRIPTION}}"
                              name="{{\App\Models\Product::COLUMN_PRODUCT_DESCRIPTION}}"
                              style="width: 100%;padding: 10px"
                              placeholder="Enter text ..."
                    >{{isset($product) ?$product->product_description:""}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                @if(isset($product))
                                    <button type="button" class="btn btn-primary update-description-button"
                                            data-dismiss="modal">
                                        <span class='glyphicon glyphicon-check'></span> Update
                                    </button>
                                @else
                                    <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">{{isset($product) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @if(isset($product))
                <li>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                        <div class="box box-success">
                            <div class="box-header"><h3
                                        class="box-title">{{__('merchant_page_products.field_title_product_properties')}}</h3>
                            </div>

                            <div class="box-body pad">
                                @include('merchants.pages.products.components.timeline_attributes_view_body')
                            </div>
                        </div>
                    </div>
                </li>
            @endif

        </ul>
        ﻿
    </div>
    <div class="col-sm-5">
        <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-light-blue-active">More information</span>
            </li>
            <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">{{__('merchant_page_products.field_title_product_pricing')}}</h3>
                        </div>
                        <div class="box-body pad form-horizontal">

                            <div class="form-group has-feedback">
                                <label class="control-label col-sm-3">{{__('merchant_page_products.field_label_normal_price')}}</label>
                                <div class="col-sm-5">
                                    <input type="number"
                                           {{isset($product)?'disabled':''}}
                                           id="{{\App\Models\Product::COLUMN_NORMAL_PRICE}}"
                                           value="{{isset($product) ? $product[\App\Models\Product::COLUMN_NORMAL_PRICE] : old(\App\Models\Product::COLUMN_NORMAL_PRICE)}}"
                                           name="{{\App\Models\Product::COLUMN_NORMAL_PRICE}}" class="form-control"
                                           placeholder="{{__('merchant_page_products.field_placeholder_normal_price')}}">
                                </div>

                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label col-sm-3">{{__('merchant_page_products.field_label_offer_price')}}</label>
                                <div class="col-sm-5">
                                    <input type="number"
                                           {{isset($product)?'disabled':''}}
                                           id="{{\App\Models\Product::COLUMN_OFFER_PRICE}}"
                                           value="{{isset($product) ? $product[\App\Models\Product::COLUMN_OFFER_PRICE] : old(\App\Models\Product::COLUMN_OFFER_PRICE)}}"
                                           name="{{\App\Models\Product::COLUMN_OFFER_PRICE}}" class="form-control"
                                           placeholder="{{__('merchant_page_products.field_placeholder_discount')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- timeline item -->
            <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <div class="box box-success">
                        <div class="box-header"><h3
                                    class="box-title">{{__('merchant_page_products.field_label_category')}}</h3></div>
                        <div class="box-body pad">
                            <div class="form-group col-sm-12">
                                @if(isset($product))
                                    <div class="form-horizontal">
                                        @foreach($product->subcategories as $subcategory)
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">{{__('merchant_page_products.field_label_category_assigned')}}</label>
                                                <div class="col-sm-6"><input class="form-control" disabled
                                                                             value="{{$subcategory->sub_category_name}}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                {{Form::select(\App\Models\Product::REL_SUBCATEGORIES.'[]',$subCategories,null,['class'=>'form-control select2 select2-hidden-accessible',
                                'style'=>'width: 100%;','multiple'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                    <div class="box box-success">
                        <div class="box-header"><h3
                                    class="box-title">{{__('merchant_page_products.field_label_expiry_date')}}</h3>
                        </div>
                        <div class="box-body pad">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <input type="text" class="form-control" id="{{\App\Models\Product::COLUMN_EXPIRE_DATE}}"
                                       name="{{\App\Models\Product::COLUMN_EXPIRE_DATE}}"
                                       value="{{isset($product)?$product->expiry_date:''}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <div class="box box-success">
                        <div class="box-header"><h3
                                    class="box-title">{{__('merchant_page_products.field_label_product_images')}}</h3>
                        </div>
                        <div class="box-body pad">
                            <div class="form-group  col-sm-7">
                                <label class="control-label"
                                       for="Date">{{__('merchant_page_products.field_label_product_images')}}</label>
                                @if(isset($product))
                                    <form action="{{route('merchant.products.update_images',$product->id)}}"
                                          method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        {!! Form::file(\App\Models\Product::REL_PRODUCT_IMAGES.'[]',['multiple'=>true]) !!}
                                        <p class="help-block">{{__('merchant_page_products.field_label_product_images_max')}}</p>
                                        <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                    </form>
                                @else
                                    <input type="file" name="{{\App\Models\Product::REL_PRODUCT_IMAGES.'[]'}}" multiple>
                                    <p class="help-block">{{__('merchant_page_products.field_label_product_images_max')}}</p>
                                @endif

                            </div>
                            <div class="form-group col-sm-5">
                                <label>{{__('merchant_page_products.field_label_product_types')}}</label>
                                {{Form::select(\App\Models\Product::COLUMN_PRODUCT_TYPE,isset($product)?[$product->product_type]:$productTypes,isset($product)?array_search($product->product_type,\App\Models\Product::DEFAULT_TYPES):array_search($type,\App\Models\Product::DEFAULT_TYPES)+1,['class'=>'form-control select2 select2-hidden-accessible',
                                'style'=>'width: 100%;',isset($product)?'disabled':''])}}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @if(isset($product))
                <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                        <div class="box box-success">
                            <div class="box-header"><h3
                                        class="box-title">{{__('merchant_page_products.field_title_product_uploaded')}}</h3>
                            </div>
                            <div class="box-body pad">
                                <ul class="mailbox-attachments clearfix">
                                    @foreach($product->images as $image)
                                        <li id="{{substr($image->image_name,0,-4)}}">
                                        <span class="mailbox-attachment-icon has-img">
                                            <img src="{{asset(\App\Services\Merchants\ImageManager::IMAGE_PATH.$image->image_name)}}"
                                                 alt="..." class="margin" style="width:150px;height:100px;">
                                        </span>
                                            <div class="mailbox-attachment-info">
                                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i>
                                                    photo1.png</a>
                                                <span class="mailbox-attachment-size">2.67 MB
                                          <button class="btn btn-default btn-xs pull-right delete-image-modal"
                                                  name="{{$image->image_name}}" id="{{$image->image_name}}"
                                                  onclick="deletePicture(this)">
                                              <i class="fas fa-trash-alt"></i>
                                          </button>
                                        </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>

