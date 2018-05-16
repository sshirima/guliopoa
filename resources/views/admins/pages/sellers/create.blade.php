@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_sellers.page_title_create')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('admin_page_sellers.content_header_title_create')}}
            <small>{{__('admin_page_sellers.content_header_sub_title_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.sellers.index')}}"> {{__('admin_page_sellers.navigation_link_index')}}</a></li>
            <li class="active">{{__('admin_page_sellers.navigation_link_create')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="row">
            <form action="{{route('admin.sellers.store')}}" method="post">
                <div class="col-xs-4">
                    @include('admins.pages.sellers.fields')
                </div>
                <div class="col-xs-5">
                    @include('admins.pages.sellers.fields_account')
                </div>
            </form>
        </div>

    </section>
@endsection
