@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_locations.page_title')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            Current registered users
            <small>These are normal users who uses our system</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"> Users</a></li>
            <li class="active">View</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 >Users accounts</h4>
            </div>
            <div class="panel-body">
                {{$admin}}
            </div>
        </div>
    </section>
@endsection
