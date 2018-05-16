@extends('merchants.layouts.master')

@section('title')
    {{__('admin_page_locations.page_title')}}
@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            Page Header
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"> Level 1</a></li>
            <li ><a href="#"> Level 2</a></li>
            <li class="active">Here</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 >Title</h4>
            </div>
            <div class="panel-body">
                {{$merchant}}
            </div>
        </div>
    </section>
@endsection
