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