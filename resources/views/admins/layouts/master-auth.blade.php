@extends('layouts.master-auth')

@section('header')
    @include('admins.layouts.body.header-auth')
@endsection

@section('content')
    <!-- Main content -->
    @yield('content-body')
@endsection
