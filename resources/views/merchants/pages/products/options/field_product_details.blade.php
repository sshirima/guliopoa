<div class="row">
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">{{$product[\App\Models\Product::COLUMN_PRODUCT_NAME]}}</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">{{$product[\App\Models\Product::REL_SELLER][\App\Models\Seller::COLUMN_SELLER_NAME]}}</span>
                    <span class="direct-chat-timestamp pull-left">Expires on: {{$product[\App\Models\Product::COLUMN_EXPIRE_DATE]}}</span>
                </div>
                <br>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($product['images'] as $key =>$image)
                            @if($key == 0)
                                <div class="item active">

                                    <img src="{{asset(\App\Services\Merchants\ImageManager::IMAGE_PATH.'/'.$image[\App\Models\ProductImage::COLUMN_IMAGE_NAME])}}" alt="First slide">

                                    <div class="carousel-caption">
                                        First Slide
                                    </div>
                                </div>
                            @else
                                <div class="item">

                                    <img src="{{asset(\App\Services\Merchants\ImageManager::IMAGE_PATH.'/'.$image[\App\Models\ProductImage::COLUMN_IMAGE_NAME])}}" alt="First slide">

                                    <div class="carousel-caption">
                                        First Slide
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
                <br>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        {!! $product[\App\Models\Product::COLUMN_PRODUCT_DESCRIPTION] !!}
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">More information</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-3">Status</label>
                    <div class="col-sm-4">
                        {!! $product[\App\Models\Product::COLUMN_IS_ACTIVE]?'<span class="label label-success">Active</span>':'<span class="label label-danger">Inactive</span>' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>