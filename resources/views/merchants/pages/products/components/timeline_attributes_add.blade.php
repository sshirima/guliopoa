<li>
    <!-- timeline icon -->
    <i class="fa fa-cog bg-blue"></i>
    <div class="timeline-item">
        <h3 class="timeline-header"><a href="#">Add products attributes</a> </h3>

        <div class="timeline-body">
            <form class="form-horizontal" action="{{route('merchant.products.attributes.store',[$product[\App\Models\Product::COLUMN_ID]])}}" method="post">
                <div class="product-attributes">
                    <div >
                        <div class="form-group entry">
                            <label for="attributes" class="col-sm-3 control-label">Attribute:</label>
                            <div class="col-sm-5">
                                {{Form::select('attributes[ids][]',$attributes,null,['class'=>'form-control','style'=>'width: 100%;'])}}
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="attributes[values][]" class="form-control" placeholder="value...">
                                    <span class="input-group-btn"><button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary" > Save </button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</li>