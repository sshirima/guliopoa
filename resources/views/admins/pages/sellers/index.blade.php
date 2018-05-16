@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_sellers.page_title')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('admin_page_sellers.content-header-title')}}
            <small>{{__('admin_page_sellers.content-header-sub-title')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.seller_groups.index')}}"> {{__('admin_page_sellers.navigation_link_index')}}</a></li>
            <li class="active">{{__('admin_page_sellers.navigation_link_view')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 >{{__('admin_page_sellers.content_body_panel_heading')}}</h4>
            </div>
            <div class="box-body">
                {!! $table->render() !!}
            </div>
        </div>
    </section>
@endsection

