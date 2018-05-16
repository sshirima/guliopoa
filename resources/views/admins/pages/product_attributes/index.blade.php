@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_product_attributes.page_title')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('admin_page_product_attributes.content-header-title')}}
            <small>{{__('admin_page_product_attributes.content-header-sub-title')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.product_attributes.index')}}"> {{__('admin_page_product_attributes.navigation_link_index')}}</a></li>
            <li class="active">{{__('admin_page_product_attributes.navigation_link_view')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 >{{__('admin_page_product_attributes.content_body_panel_heading')}}</h4>
            </div>
            <div class="panel-body">
                {!! $table->render() !!}
            </div>
        </div>
    </section>
@endsection

