<div class="form-horizontal">
    @if(count($product[\App\Models\Product::REL_ATTRIBUTES]) >0)
        <div class="form-group">
            <label for="inputName" class="control-label col-sm-3 control-label">Price factor</label>
            <div class="col-sm-6">
                @if(isset($product->priceDecision))
                    {{$product->priceDecision->decision_name}}
                @else
                    <span class="label label-warning">Not set</span>
                @endif
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