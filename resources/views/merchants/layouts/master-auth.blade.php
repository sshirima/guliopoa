@extends('layouts.master-auth')

@section('header')
    @include('merchants.layouts.body.header-auth')
@endsection

@section('content')
    @yield('content-body')
@endsection
