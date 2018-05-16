@extends('merchants.layouts.master')

@section('title')
    {{__('merchant_page_products.page_title_show')}}
@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content_header_title_show')}}
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a></li>
            <li class="active">{{__('merchant_page_products.navigation_link_show')}}</li>
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
                @include('merchants.pages.products.options.field_product_details')
            </div>
        </div>

    </section>
@endsection

