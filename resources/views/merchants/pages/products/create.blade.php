@extends('merchants.layouts.master')

@section('custom-import-up')
    <!-- Select 2 from CDN -->
    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


@endsection
@section('title')
    @if(isset($product))
        {{__('merchant_page_products.page_title_edit')}}
    @else
        {{__('merchant_page_products.page_title_create')}}
    @endif

@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content_header_title_edit')}}
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a></li>
            @if(isset($product))
                <li class="active">{{__('merchant_page_products.navigation_link_edit')}}</li>
            @else
                <li class="active">{{__('merchant_page_products.navigation_link_create')}}</li>
            @endif

        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @if(isset($product))
                    @include('merchants.pages.products.options.nav_tabs')
                @endif
            </ul>
            <div class="tab-content">
                @if(isset($product))
                    <input id="product" type="hidden" value="{{ json_encode($product) }}">
                    <input id="public_path" type="hidden" value="{{ asset(\App\Services\Merchants\ImageManager::IMAGE_PATH)}}">
                    @include('merchants.pages.products.fields')
                @else
                    <form action="{{route('merchant.products.store')}}" method="post" enctype="multipart/form-data">
                        {{--<input type="hidden" name="_method" value="PUT">--}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('merchants.pages.products.fields')
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('custom-import-bottom')

    <!-- Wysihtml5 3 -->
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- JQuery custom code -->
    <script type="text/javascript">
        $('#product_description').wysihtml5()
        $('.select2').select2()
        $('#expiry_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })
    </script>

    @if(isset($product))
        @include('merchants.pages.products.modals.edit_title')
        @include('merchants.pages.products.modals.delete_image')
        <script src="{{ URL::asset('js/merchants/update_product.js') }}"></script>
    @endif
@endsection


