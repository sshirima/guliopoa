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
        <ul class="timeline">

            <!-- timeline time label -->
            <li class="time-label">
        <span class="bg-light-blue-active">
            Pricing your product
        </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="fa fa-money-bill-alt bg-blue"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#">Current attributes</a></h3>

                    <div class="timeline-body">
                        <div class="form-horizontal">
                            @if(count($product[\App\Models\Product::REL_ATTRIBUTES]) >0)
                                <div class="form-group">
                                    <label for="inputName" class="control-label col-sm-3 control-label">Price factor</label>
                                    <div class="col-sm-6">
                                        {{$product->priceDecision->decision_name}}
                                    </div>
                                </div>
                                @foreach($product[\App\Models\Product::REL_ATTRIBUTES] as $attribute)
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-3 control-label">{{$attribute->attribute_name}}</label>
                                        <div class="col-sm-6">
                                            <input disabled class="form-control" value="{{$attribute->pivot->value}}">
                                        </div>
                                    </div>
                                @endforeach
                                @else
<div class="alert alert-warning">Nothing has been configured</div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="fa fa-info bg-blue"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#">Config details</a></h3>

                    <div class="timeline-body">
                        <dl class="dl-horizontal">
                            <dt >Price factor</dt>
                            <dd>This is used to quantify your product, and the the price you enter below it will be per this unit. By default system will select <b>unit</b> as the price factor, and the
                            price will be per single unit. For example, shoes are sold in <b>units</b></dd>
                            <dt>Price</dt>
                            <dd>In this field normal price of the product must be specified</dd>
                            <dt>Offer price</dt>
                            <dd>In this field offer price of the product must be specified, and it should be less than normal price</dd>
                            <dt>(Optional) Stock</dt>
                            <dd>Specify the number of items available on the stock, and this will be usefull in tracking your stock during purchase. Currently stocking feature is not activated</dd>
                        </dl>
                    </div>
                </div>
            </li>
            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <i class="fa fa-cog bg-blue"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#">Configure pricing</a> </h3>

                    <div class="timeline-body">
                        <form class="form-horizontal" action="{{route('merchant.products.costs.store',[$product[\App\Models\Product::COLUMN_ID]])}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-6">
                                    {{Form::select(\App\Models\Product::COLUMN_PRICE_DECISION_ID,$priceDecisions,array_search(\App\Models\PriceDecision::DEFAULT_VALUE,$priceDecisions),['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%;'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Price:</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" value="{{old('normal_price')}}" name="normal_price" placeholder="Price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Offer price:</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" value="{{old('offer_price')}}" name="offer_price" placeholder="Offer price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Total stock:</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" value="{{old('stock')}}" name="stock" placeholder="Available in stock">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary" > Submit info </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->

            ...

        </ul>
    </div>
</div>