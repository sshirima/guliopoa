@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_locations.page_title_edit')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('admin_page_locations.content_header_title_edit')}}
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.categories.index')}}"> {{__('admin_page_locations.navigation_link_index')}}</a></li>
            <li class="active">{{__('admin_page_locations.navigation_link_edit')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 >{{__('admin_page_locations.content_panel_title_edit')}}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="register-box-body">
                            <form action="{{route('admin.locations.update',[$location[\App\Models\Location::COLUMN_ID]])}}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                @include('admins.pages.locations.fields')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
