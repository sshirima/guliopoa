@extends('merchants.layouts.master')

@section('title')
    {{__('merchant_page_products.page_title_attributes')}}
@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content_header_title_attributes')}}
            <small>{{__('merchant_page_products.content_header_title_attributes_details')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a></li>
            <li class="active">{{__('merchant_page_products.navigation_link_attributes')}}</li>
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
                Info
            </div>
        </div>

    </section>
@endsection
