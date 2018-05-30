@extends('merchants.layouts.master')

@section('title')
    {{__('merchant_page_products.page_title_attributes')}}
@endsection

@section('content-head')
    {{--@include('merchants.layouts.body.content-header')--}}
    <section class="content-header">
        <h1>
            {{__('merchant_page_products.content_header_title_attributes')}}
            <small>{{__('merchant_page_products.content_header_title_attributes_details')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('merchant.products.index')}}"> {{__('merchant_page_products.navigation_link_index')}}</a>
            </li>
            <li class="active">{{__('merchant_page_products.navigation_link_attributes')}}</li>
        </ol>
    </section>
@endsection

@section('content-body')
    <section class="content container-fluid">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @include('merchants.pages.products.options.nav_tabs')
            </ul>
            <div class="tab-content">
                @include('merchants.pages.products.options.field_product_attributes')
            </div>
        </div>

    </section>
@endsection

@section('custom-import-bottom')

    <script type="text/javascript">

        //Dynamic add attribute field
        $(function () {
            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();

                var controlForm = $('.product-attributes div:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });
    </script>
@endsection