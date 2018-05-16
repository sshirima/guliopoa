@extends('admins.layouts.master')

@section('title')
    {{__('admin_page_accounts.admin_create_page_title')}}
@endsection

@section('content-head')
    {{--@include('admins.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            Create new admin account
            <small>Account will be used as for administration tasks</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.admin_accounts.index')}}"> Admins</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 >New admin details</h4>
                    </div>
                    <div class="panel-body">
                        <div class="register-box-body">
                            <form action="{{route('admin.admin_accounts.store')}}" method="post">
                                @include('admins.pages.accounts.admin.fields')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
