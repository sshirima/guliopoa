<div class="row">
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">{{$product[\App\Models\Product::COLUMN_PRODUCT_NAME]}}</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Expires on: {{$product[\App\Models\Product::COLUMN_EXPIRE_DATE]}}</span>
                    <span class="direct-chat-timestamp pull-left">{{$product[\App\Models\Product::REL_SELLER][\App\Models\Seller::COLUMN_SELLER_NAME]}}</span>
                    </div>
                <br>
                @include('merchants.pages.products.components.images_view')
                <br>
                @include('merchants.pages.products.components.description_view')

            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-6">
        <ul class="timeline">

            <!-- timeline time label -->
            <li class="time-label">
            <span class="bg-light-blue-active">
                Properties
            </span>
            </li>
            <!-- timeline item -->
            @include('merchants.pages.products.components.timeline_attributes_view')
            <!-- timeline item -->
            {{--@include('merchants.pages.products.components.timeline_attributes_description')--}}
            <!-- timeline item -->
            {{--@include('merchants.pages.products.components.timeline_attributes_config')--}}
            <!-- END timeline item -->
            @include('merchants.pages.products.components.timeline_attributes_add')
        </ul>
    </div>
</div>
