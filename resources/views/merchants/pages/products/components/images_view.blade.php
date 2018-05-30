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