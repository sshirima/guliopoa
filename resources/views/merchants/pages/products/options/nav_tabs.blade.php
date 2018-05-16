<li class="{{Request::is('merchant/products/*/show') ? 'active' : ''}}"><a href="{{route('merchant.products.show',$product[\App\Models\Product::COLUMN_ID])}}" aria-expanded="true"><h4 class="box-title">{{__('merchant_page_products.panel_nav_tab_heading_view')}}</h4></a></li>
<li class="{{Request::is('merchant/products/*/edit') ? 'active' : ''}}"><a href="{{route('merchant.products.edit',$product[\App\Models\Product::COLUMN_ID])}}" aria-expanded="false"><h4 class="box-title">{{__('merchant_page_products.panel_nav_tab_heading_edit')}}</h4></a></li>
<li class="{{Request::is('merchant/products/*/attributes') ? 'active' : ''}}"><a href="{{route('merchant.products.attributes',$product[\App\Models\Product::COLUMN_ID])}}" aria-expanded="false"><h4 class="box-title">{{__('merchant_page_products.panel_nav_tab_heading_attributes')}}</h4></a></li>
<li class="{{Request::is('merchant/products/*/cost') ? 'active' : ''}}"><a href="{{route('merchant.products.costs',$product[\App\Models\Product::COLUMN_ID])}}" aria-expanded="false"><h4 class="box-title"> {{__('merchant_page_products.panel_nav_tab_heading_cost')}}</h4></a></li>

