@extends('merchants.layouts.master')

@section('custom-import-up')
    <!-- Select 2 from CDN -->
    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

@endsection
@section('title')
    {{__('merchant_page_products.page_title_create')}}
@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content_header_title_edit')}}
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a></li>
            <li class="active">{{__('merchant_page_products.navigation_link_create')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <form action="{{route('merchant.products.store')}}" method="post" enctype="multipart/form-data">
            {{--<input type="hidden" name="_method" value="PUT">--}}
            @include('merchants.pages.products.fields')
        </form>
    </section>
@endsection

@section('custom-import-bottom')

    <!-- Wysihtml5 3 -->
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ URL::asset('js/merchants/page_merchant_product_create.js') }}"></script>
    <!-- JQuery custom code -->
    <script type="text/javascript">
        $('#product_description').wysihtml5()
        $('.select2').select2()
        $('#expiry_date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
    </script>
@endsection


