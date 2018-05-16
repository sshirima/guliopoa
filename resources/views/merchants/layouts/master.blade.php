@extends('layouts.master_merchant')

@section('header')
    @include('merchants.layouts.body.header')
@endsection

@section('sidebar-left')
    @include('merchants.layouts.body.sidebar-left')
@endsection

@section('sidebar-right')
    @include('merchants.layouts.body.sidebar-right')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content-head')
    <!-- Operation status -->
        <div style="padding: 10px">
            @include('flash::message')
            @include('includes.errors.message')
        </div>
    <!-- Main content -->
        @yield('content-body')
        <!-- /.content -->
    </div>
@endsection

@section('footer')
    @include('merchants.layouts.body.footer')
@endsection
