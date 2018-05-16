@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_product_attributes.page_title_create')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('admin_page_product_attributes.content_header_title_create')}}
            <small>{{__('admin_page_product_attributes.content_header_sub_title_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.product_attributes.index')}}"> {{__('admin_page_product_attributes.navigation_link_index')}}</a></li>
            <li class="active">{{__('admin_page_product_attributes.navigation_link_create')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 >{{__('admin_page_product_attributes.content_panel_title_create')}}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="register-box-body">
                            <form action="{{route('admin.product_attributes.store')}}" method="post">
                                @include('admins.pages.product_attributes.fields')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
