@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_accounts.admin_index_page_title')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            System Administrators
            <small>These are normal users who perform administration tasks like approval of the adverts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.admin_accounts.index')}}"> Admins</a></li>
            <li class="active">View</li>
        </ol>
    </section>
@endsection

@section('content-body')

    <section class="content container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 >Admins accounts</h4>
            </div>
            <div class="panel-body">
                {!! $table->render() !!}
            </div>
        </div>
    </section>
@endsection
