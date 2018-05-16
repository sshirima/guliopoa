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
            <li><a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a></li>
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
                    <i class="fas fa-plus"></i>  {{__('merchant_page_products.panel_nav_tab_new_product')}}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $table->render() !!}
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
                    <a href="{{route('merchant.products.create',['type'=>\App\Models\Product::DEFAULT_TYPES[0]])}}" class="col-sm-6">
                        <div class="box box-solid box-success">
                            <div class="box-header">
                                <h4 > <i class="fas fa-plus-circle"></i>  {{__('merchant_page_products.modal_new_advert_panel_good_title')}}</h4>
                            </div>
                            <div class="box-body">
                                {{__('merchant_page_products.modal_new_advert_panel_good_body')}}
                            </div>
                        </div>
                    </a>
                    <a href="{{route('merchant.products.create',['type'=>\App\Models\Product::DEFAULT_TYPES[1]])}}" type="submit" class="col-sm-6">
                        <div class="box box-solid box-info">
                            <div class="box-header">
                                <h4 ><i class="fas fa-plus-circle"></i>  {{__('merchant_page_products.modal_new_advert_panel_service_title')}}</h4>
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

