<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('bower_components/admin-lte/dist/img/boxed-bg.png')}}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$admin->first_name.' '.$admin->last_name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{__('admin_side_bar_left.status_online')}}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{__('admin_side_bar_left.header_title_system_settings')}}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class="fas fa-home"></i>  <span>{{__('admin_side_bar_left.tree_view_title_general')}}</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="#"><span> {{__('admin_side_bar_left.tree_view_option_dashboard')}}</span></a></li>
                    <li ><a href="#"><span> {{__('admin_side_bar_left.tree_view_option_reports')}}</span></a></li>
                </ul>
            </li>

            <li class="{{Request::is('admin/product_attributes*') ? 'active' : ''}}"><a href="{{route('admin.product_attributes.index')}}"><i class="fas fa-link"></i> <span> {{__('admin_side_bar_left.tree_view_option_product_attributes')}}</span></a></li>
            <li class="{{Request::is('admin/price_decisions*') ? 'active' : ''}}"><a href="{{route('admin.price_decisions.index')}}"><i class="fas fa-link"></i> <span> {{__('admin_side_bar_left.tree_view_option_price_decisions')}}</span></a></li>
            <li class="{{Request::is('admin/sellers*') ? 'active' : ''}}"><a href="{{route('admin.sellers.index')}}"><i class="fas fa-link"></i> <span> {{__('admin_side_bar_left.tree_view_option_sellers')}}</span></a></li>
            <li class="{{Request::is('admin/sub_categories*') ? 'active' : ''}}"><a href="{{route('admin.sub_categories.index')}}"><i class="fas fa-link"></i> <span> {{__('admin_side_bar_left.tree_view_option_sub_categories')}}</span></a></li>
            <li class="{{Request::is('admin/categories*') ? 'active' : ''}}"><a href="{{route('admin.categories.index')}}"><i class="fas fa-link"></i> <span> {{__('admin_side_bar_left.tree_view_option_categories')}}</span></a></li>
            <li class="{{Request::is('admin/locations*') ? 'active' : ''}}"><a href="{{route('admin.locations.index')}}"><i class="fas fa-location-arrow"></i> <span> {{__('admin_side_bar_left.tree_view_option_locations')}}</span></a></li>
            <li class="{{Request::is('admin/currencies*') ? 'active' : ''}}"><a href="{{route('admin.currencies.index')}}"><i class="fas fa-link"></i><span> {{__('admin_side_bar_left.tree_view_option_currencies')}}</span></a></li>
            <li class="{{Request::is('admin/seller_group*') ? 'active' : ''}}"><a href="{{route('admin.seller_groups.index')}}"><i class="fas fa-link"></i><span> {{__('admin_side_bar_left.tree_view_option_seller_groups')}}</span></a></li>
            <li class="header">{{__('admin_side_bar_left.header_title_administration')}}</li>
            <li class="treeview {{Request::is('admin/accounts*') ? 'active' : ''}}">
                <a href="#"><i class="fas fa-users-cog"></i> <span> Accounts </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.admin_accounts.index')}}"> {{__('admin_side_bar_left.tree_view_option_admins')}}</a></li>
                    <li><a href="{{route('admin.merchant_accounts.index')}}"> {{__('admin_side_bar_left.tree_view_option_merchants')}}</a></li>
                    <li><a href="#"> {{__('admin_side_bar_left.tree_view_option_customers')}}</a></li>
                </ul>
            </li>
            <li ><a href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt"></i> <span> Logout</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>