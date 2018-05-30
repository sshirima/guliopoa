@extends('merchants.layouts.master')

@section('title')
    {{__('merchant_page_products.page_title_cost')}}
@endsection

@section('custom-import-up')
    <!-- Select 2 from CDN -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content_header_title_cost')}}
            <small>{{__('merchant_page_products.content_header_title_cost_details')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a></li>
            <li class="active">{{__('merchant_page_products.navigation_link_cost')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @include('merchants.pages.products.options.nav_tabs')
            </ul>
            <div class="tab-content">
                @include('merchants.pages.products.options.field_product_costs')
            </div>
        </div>

    </section>
@endsection

@section('custom-import-bottom')
    <!-- Select2 -->
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JQuery custom code -->
    <script type="text/javascript">
        $('.select2').select2()
    </script>
@endsection
