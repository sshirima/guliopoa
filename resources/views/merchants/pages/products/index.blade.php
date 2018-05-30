@extends('merchants.layouts.master')

@section('title')
    {{__('merchant_page_products.page_title')}}
@endsection

@section('content-head')
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content-header-title')}}
            <small>{{__('merchant_page_products.content-header-sub-title')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a>
            </li>
            <li class="active">{{__('merchant_page_products.navigation_link_view')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header">
                @if(isset($viewType))
                    @if($viewType == 'Grid')
                        <a href="{{route('merchant.products.index',['viewType'=>'Table'])}}" class="btn btn-default">
                            <i class="fas fa-list-ul"></i> Table view
                        </a>
                    @else
                        <a href="{{route('merchant.products.index',['viewType'=>'Grid'])}}" class="btn btn-default">
                            <i class="fas fa-th"></i> Grid view
                        </a>
                    @endif
                @else
                    <a href="{{route('merchant.products.index',['viewType'=>'Grid'])}}" class="btn btn-default">
                        <i class="fas fa-th"></i> Grid view
                    </a>
                @endif
                <h4 class="box-title control-label"> {{__('merchant_page_products.content_body_panel_heading')}}</h4>

                <div class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i> {{__('merchant_page_products.panel_nav_tab_new_product')}}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($viewType == 'Grid')
                    @if(count($table) > 0)
                        <div class="form-group">
                            @foreach($table as $product)
                                <a href="{{route('merchant.products.show',$product->id)}}" style="color: black">
                                    <div class="col-sm-3">
                                        <div class="box box-widget">
                                            <div class="box-header with-border">
                                                <span class="username"><h4><strong>{{\App\Models\Product::getExcerpt($product[\App\Models\Product::COLUMN_PRODUCT_NAME],0,40)}}</strong></h4></span>
                                                <div class="description text-muted">
                                                    <span class="text-muted"> {{$product->seller[\App\Models\Seller::COLUMN_SELLER_NAME]}}</span>
                                                    <span class="text-muted pull-right"><i>Posted on: {{date_format(date_create($product[\App\Models\Product::CREATED_AT]),'M j')}}</i></span>
                                                </div>

                                                <!-- /.user-block -->
                                                <div class="box-tools">
                                                    {{--<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                                                        <i class="fa fa-circle-o"></i></button>--}}
                                                </div>
                                                <!-- /.box-tools -->
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" style="">
                                                @if(count($product->images) >0)
                                                    <img class="img-responsive pad"
                                                         src="{{asset(\App\Services\Merchants\ImageManager::IMAGE_PATH.'/'.$product->images[0]->image_name)}}"
                                                         alt="Photo">
                                                @else
                                                    <img src="{{asset(\App\Services\Merchants\ImageManager::IMAGE_PATH.'/')}}"
                                                         alt="..." class="margin" style="width:150px;height:100px;">
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <strong style="font-size: 16px;">{{($product[\App\Models\Product::COLUMN_NORMAL_PRICE]-$product[\App\Models\Product::COLUMN_OFFER_PRICE])/$product[\App\Models\Product::COLUMN_NORMAL_PRICE]*100 .'%'.' discount'}}</strong>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="pull-right">
                                                            <del style="font-size: 14px">
                                                                Tsh{{$product[\App\Models\Product::COLUMN_NORMAL_PRICE]/1000 .'k'}}</del>
                                                            <strong style="font-size: 16px">Tsh{{' '.$product[\App\Models\Product::COLUMN_OFFER_PRICE]/1000 .'k'}}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{!! \App\Models\Product::getExcerpt($product[\App\Models\Product::COLUMN_PRODUCT_DESCRIPTION],0,100) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span type="button" class="btn btn-default btn-xs"><i
                                                                    class="fas fa-star"></i> Not rated</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if($product->is_active)
                                                            <span class="btn btn-success pull-right btn-xs">Active</span>
                                                        @else
                                                            <span class="btn btn-danger pull-right  btn-xs">Inactive</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-default"> Nothing has been posted yet</div>
                    @endif
                @else
                    {!! $table->render() !!}
                @endif
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- New product modal -->
    <div class="modal fade" id="myModal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">{{__('merchant_page_products.modal_new_advert_title')}}</h4>
                </div>
                <div class="modal-body text-center btn-lg">
                    <a href="{{route('merchant.products.create',['type'=>\App\Models\Product::DEFAULT_TYPES[0]])}}"
                       class="col-sm-6">
                        <div class="box box-solid box-success">
                            <div class="box-header">
                                <h4>
                                    <i class="fas fa-plus-circle"></i> {{__('merchant_page_products.modal_new_advert_panel_good_title')}}
                                </h4>
                            </div>
                            <div class="box-body">
                                {{__('merchant_page_products.modal_new_advert_panel_good_body')}}
                            </div>
                        </div>
                    </a>
                    <a href="{{route('merchant.products.create',['type'=>\App\Models\Product::DEFAULT_TYPES[1]])}}"
                       type="submit" class="col-sm-6">
                        <div class="box box-solid box-info">
                            <div class="box-header">
                                <h4>
                                    <i class="fas fa-plus-circle"></i> {{__('merchant_page_products.modal_new_advert_panel_service_title')}}
                                </h4>
                            </div>
                            <div class="box-body">
                                {{__('merchant_page_products.modal_new_advert_panel_service_body')}}
                            </div>
                        </div>
                    </a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        {{__('merchant_page_products.modal_new_advert_button_close')}}
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

