<div class="form-group has-feedback">
    @if(isset($priceDecision))
        <input type="text" disabled value="{{isset($priceDecision) ? $priceDecision[\App\Models\PriceDecision::COLUMN_DECISION_CODE] : old(\App\Models\PriceDecision::COLUMN_DECISION_CODE)}}" name="{{\App\Models\PriceDecision::COLUMN_DECISION_CODE}}" class="form-control" placeholder="{{__('admin_page_price_decisions.field_placeholder_code')}}">
    @else
        <input type="text" value="{{old(\App\Models\Currency::COLUMN_CODE)}}" name="{{\App\Models\PriceDecision::COLUMN_DECISION_CODE}}" class="form-control" placeholder="{{__('admin_page_price_decisions.field_placeholder_code')}}">
    @endif
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($priceDecision) ? $priceDecision[\App\Models\PriceDecision::COLUMN_DECISION_NAME] : old(\App\Models\PriceDecision::COLUMN_DECISION_NAME)}}" name="{{\App\Models\PriceDecision::COLUMN_DECISION_NAME}}" class="form-control" placeholder="{{__('admin_page_price_decisions.field_placeholder_name')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="text" value="{{isset($priceDecision) ? $priceDecision[\App\Models\PriceDecision::COLUMN_DESCRIPTION] : old(\App\Models\PriceDecision::COLUMN_DESCRIPTION)}}" name="{{\App\Models\PriceDecision::COLUMN_DESCRIPTION}}" class="form-control" placeholder="{{__('admin_page_price_decisions.field_placeholder_description')}}">
    <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
</div>

<div class="row">
    <!-- /.col -->
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{isset($priceDecision) ? __('auth.admin_update') : __('auth.admin_create')}}</button>
    </div>
    <!-- /.col -->
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">