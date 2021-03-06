<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="height:35px">
                <img src="/assets/profile/{{ $user->photo }}" class="rounded-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name ?? '' }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control border-0" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i><span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            @user
            <li class="{{ Request::is('orders*') ? 'active' : '' }}">
                <a href="{{ route('orders.user') }}"><i class="fa fa-shopping-cart"></i><span>{{ __('My Orders') }}</span></a>
            </li>
            @enduser
            <li class="treeview {{ Request::is('orders*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa  fa-shopping-cart" aria-hidden="true"></i> <span>Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        <small><span class="badge badge-danger">{{ $incomplete_for_admin ?? 0 }}</span></small>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('orders-incomplete') ? 'active' : '' }}"><a href="{{ route('orders.incomplete') }}"><i class="fa fa-circle-o"></i>Incomplete Orders <small class="label pull-right"><span class="badge badge-danger">{{ $incomplete_for_admin ?? 0 }}</span></small></a></li>
                    <li class="{{ Request::is('orders') ? 'active' : '' }}"><a href="{{ route('orders.index') }}"><i class="fa fa-circle-o"></i> All Orders</a></li>
                </ul>
            </li>
            @moderator(Order)
            <li class="{{ Request::is('cashbooks') ? 'active' : '' }}">
                <a href="{{ route('cashbooks.index') }}"><i class="fa fa-bell"></i><span>{{ __('Cashbook') }}</span></a>
            </li>
            @endmoderator
            <li class="treeview {{ Request::is('products*') || Request::is('manage-products*') || Request::is('cars*') || Request::is('manage-cars*') || Request::is('manage-motorcycles*') || Request::is('motorcycles*') || Request::is('manage-bicycles*') || Request::is('bicycles*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Product</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('manage-products') ? 'active' : '' }}"><a href="{{ route('manage-products') }}"><i class="fa fa-circle-o"></i> Manage Product</a></li>
                    <li class="{{ Request::is('products/create') ? 'active' : '' }}"><a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i> Add New Product</a></li>
                    @moderator(Product)
                    <li class="{{ Request::is('manage-cars') ? 'active' : '' }}"><a href="{{ route('manage-cars') }}"><i class="fa fa-circle-o"></i> Manage Car</a></li>
                    <li class="{{ Request::is('cars/create') ? 'active' : '' }}"><a href="{{ route('cars.create') }}"><i class="fa fa-circle-o"></i> Add New Car</a></li>
                    <li class="{{ Request::is('manage-motorcycles') ? 'active' : '' }}"><a href="{{ route('manage-motorcycles') }}"><i class="fa fa-circle-o"></i> Manage Motorcycle</a></li>
                    <li class="{{ Request::is('motorcycles/create') ? 'active' : '' }}"><a href="{{ route('motorcycles.create') }}"><i class="fa fa-circle-o"></i> Add New Motorcycle</a></li>
                    <li class="{{ Request::is('manage-bicycles') ? 'active' : '' }}"><a href="{{ route('manage-bicycles') }}"><i class="fa fa-circle-o"></i> Manage Bicycle</a></li>
                    <li class="{{ Request::is('bicycles/create') ? 'active' : '' }}"><a href="{{ route('bicycles.create') }}"><i class="fa fa-circle-o"></i> Add New Bicycle</a></li>
                    @endmoderator
                </ul>
            </li>
            @dealeroradmin
            <li class="treeview {{ Request::is('notifications*') || Request::is('loan-infos') || Request::is('requested-more-infos*') || Request::is('make-an-offers*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-bell"></i><span>{{ __('Notification') }}</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu {{ Request::is('notifications*') || Request::is('requested-more-infos*') || Request::is('make-an-offers*') ? 'show' : '' }}">
                    @moderator(Notification)
                    <li class="{{ Request::is('notifications-all') ? 'active' : '' }}"><a href="{{ route('notifications.all') }}"><i class="fa fa-circle-o"></i> {{ __('All Notifications') }}</a></li>
                    <li class="{{ Request::is('notifications/create') ? 'active' : '' }}"><a href="{{ route('notifications.create') }}"><i class="fa fa-circle-o"></i> {{ __('Send Notification') }}</a></li>
                    <li class="{{ Request::is('loan-infos*') ? 'active' : '' }}"><a href="{{ route('loan-infos.index') }}"><i class="fa fa-circle-o"></i> {{ __('Applications for Loan') }}</a></li>
                    @endmoderator
                    <li class="{{ Request::is('requested-more-infos*') ? 'active' : '' }}"><a href="{{ route('requested-more-infos.unviewed') }}"><i class="fa fa-circle-o"></i> {{ __('Requested More Infos') }}</a></li>
                    <li class="{{ Request::is('make-an-offers*') ? 'active' : '' }}"><a href="{{ route('make-an-offers.unviewed') }}"><i class="fa fa-circle-o"></i> {{ __('Offers Made') }}</a></li>

                    <li class="{{ Request::is('notifications') ? 'active' : '' }}"><a href="{{ route('notifications.index') }}"><i class="fa fa-circle-o"></i> {{ __('My Notifications') }}</a></li>
                </ul>
            </li>
            @else
            <li class="{{ Request::is('notifications') ? 'active' : '' }}">
                <a href="{{ route('notifications.index') }}"><i class="fa fa-bell"></i><span>{{ __('My Notifications') }}</span></a>
            </li>
            @enddealeroradmin
            <li class="treeview {{ Request::is('users*') ? 'active' : '' }}">
                <a href="#">
                    @moderator(User)
                    <i class="fa fa-user"></i><span>{{ __('User Management') }}</span>
                    @else
                    <i class="fa fa-user"></i><span>{{ __('Profile') }}</span>
                    @endmoderator
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu {{ Request::is('users*') ? 'show' : '' }}">
                    <li class="{{ Request::route()->getName() == 'users.edit' ? 'active' : '' }}"><a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-circle-o"></i> {{ __('My Profile') }}</a></li>
                    @moderator(User)
                    <li class="{{ Request::route()->getName() == 'users.index' ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> {{ __('All Users') }}</a></li>
                    @endmoderator
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-circle-o"></i> {{ __('Logout') }}</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('chat') ? 'active' : '' }}">
                <a href="{{ route('chats.index') }}"><i class="fa fa-envelope"></i><span>{{ __('Chat') }}</span></a>
            </li>
            @moderator(Product)
            <li class="treeview {{ Request::is('blogs*') || Request::is('manage-blogs*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Blog</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('manage-blogs') ? 'active' : '' }}"><a href="{{ route('manage-blogs') }}"><i class="fa fa-circle-o"></i> Manage Blogs</a></li>
                    <li class="{{ Request::is('blogs/create') ? 'active' : '' }}"><a href="{{ route('blogs.create') }}"><i class="fa fa-circle-o"></i> Add New Post</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Product)
            <li class="treeview {{ Request::is('home-sliders*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-paint-brush" aria-hidden="true"></i> <span>Home Slider</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('home-sliders') ? 'active' : '' }}"><a href="{{ route('home-sliders.index') }}"><i class="fa fa-circle-o"></i> Manage Home Sliders</a></li>
                    <li class="{{ Request::is('home-sliders/create') ? 'active' : '' }}"><a href="{{ route('home-sliders.create') }}"><i class="fa fa-circle-o"></i> Add New Slider</a></li>
                </ul>
            </li>
            @endmoderator
            
            @moderator(Product)
            <li class="treeview {{ Request::is('versus-sliders*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-paint-brush" aria-hidden="true"></i> <span>Vs View Slider</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('versus-sliders') ? 'active' : '' }}"><a href="{{ route('versus-sliders.index') }}"><i class="fa fa-circle-o"></i> Manage Versus Sliders</a></li>
                    <li class="{{ Request::is('versus-sliders/create') ? 'active' : '' }}"><a href="{{ route('versus-sliders.create') }}"><i class="fa fa-circle-o"></i> Add New Slider</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Product)
            <li class="treeview {{ Request::is('advertisements*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-audio-description" aria-hidden="true"></i> <span>Advertisement</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('advertisements') ? 'active' : '' }}"><a href="{{ route('advertisements.index') }}"><i class="fa fa-circle-o"></i> Manage Advertisements</a></li>
                    <li class="{{ Request::is('advertisements/create') ? 'active' : '' }}"><a href="{{ route('advertisements.create') }}"><i class="fa fa-circle-o"></i> Add New Advertisement</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Payment)
            <li class="treeview {{ Request::is('banks*') || Request::is('manage-banks') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-bank" aria-hidden="true"></i> <span>Bank</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('manage-banks') ? 'active' : '' }}"><a href="{{ route('manage-banks') }}"><i class="fa fa-circle-o"></i> Manage Banks</a></li>
                    <li class="{{ Request::is('banks/create') ? 'active' : '' }}"><a href="{{ route('banks.create') }}"><i class="fa fa-circle-o"></i> Add New Bank</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Payment)
            <li class="treeview {{ Request::is('insurance-companies*') || Request::is('manage-insurance-companies*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-industry" aria-hidden="true"></i> <span>Insurance Company</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('manage-insurance-companies') ? 'active' : '' }}"><a href="{{ route('manage-insurance-companies') }}"><i class="fa fa-circle-o"></i> Manage Company</a></li>
                    <li class="{{ Request::is('insurance-companies/create') ? 'active' : '' }}"><a href="{{ route('insurance-companies.create') }}"><i class="fa fa-circle-o"></i> Add New Company</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Location)
            <li class="treeview {{ Request::is('regions*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-address-card" aria-hidden="true"></i> <span>Location</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('regions') ? 'active' : '' }}"><a href="{{ route('regions.index') }}"><i class="fa fa-circle-o"></i> Manage Region</a></li>
                    <li class="{{ Request::is('regions/create') ? 'active' : '' }}"><a href="{{ route('regions.create') }}"><i class="fa fa-circle-o"></i> Add New Region</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Color)
            <li class="treeview {{ Request::is('colors*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-paint-brush" aria-hidden="true"></i> <span>Color</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('colors') ? 'active' : '' }}"><a href="{{ route('colors.index') }}"><i class="fa fa-circle-o"></i> Manage Color</a></li>
                    <li class="{{ Request::is('colors/create') ? 'active' : '' }}"><a href="{{ route('colors.create') }}"><i class="fa fa-circle-o"></i> Add New Color</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Order Status)
            <li class="treeview {{ Request::is('order-statuses*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Order Status</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('order-statuses') ? 'active' : '' }}"><a href="{{ route('order-statuses.index') }}"><i class="fa fa-circle-o"></i> Manage Order Status</a></li>
                    <li class="{{ Request::is('order-statuses/create') ? 'active' : '' }}"><a href="{{ route('order-statuses.create') }}"><i class="fa fa-circle-o"></i> Add New Status</a></li>
                </ul>
            </li>
            @endmoderator
            @moderator(Dropdown)
            <li class="treeview {{ Request::is('dropdowns*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-database" aria-hidden="true"></i> <span>Dropdowns</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('dropdowns/additional-features') ? 'active' : '' }}"><a href="{{ route('additional-features.index') }}"><i class="fa fa-circle-o"></i> Manage Additional Feature</a></li>
                    <li class="{{ Request::is('dropdowns/after-sell-services') ? 'active' : '' }}"><a href="{{ route('after-sell-services.index') }}"><i class="fa fa-circle-o"></i> Manage After Sell Service</a></li>
                    <li class="{{ Request::is('dropdowns/auction-grades') ? 'active' : '' }}"><a href="{{ route('auction-grades.index') }}"><i class="fa fa-circle-o"></i> Manage Auction Grade</a></li>
                    <li class="{{ Request::is('dropdowns/bicycle-types') ? 'active' : '' }}"><a href="{{ route('bicycle-types.index') }}"><i class="fa fa-circle-o"></i> Manage Bicycle Type</a></li>
                    <li class="{{ Request::is('dropdowns/biker-genders') ? 'active' : '' }}"><a href="{{ route('biker-genders.index') }}"><i class="fa fa-circle-o"></i> Manage Biker Gender</a></li>
                    <li class="{{ Request::is('dropdowns/body-types') ? 'active' : '' }}"><a href="{{ route('body-types.index') }}"><i class="fa fa-circle-o"></i> Manage Body Type</a></li>
                    <li class="{{ Request::is('dropdowns/brands') ? 'active' : '' }}"><a href="{{ route('brands.index') }}"><i class="fa fa-circle-o"></i> Manage Brand</a></li>
                    <li class="{{ Request::is('dropdowns/conditions') ? 'active' : '' }}"><a href="{{ route('conditions.index') }}"><i class="fa fa-circle-o"></i> Manage Condition</a></li>
                    <li class="{{ Request::is('dropdowns/cooling-systems') ? 'active' : '' }}"><a href="{{ route('cooling-systems.index') }}"><i class="fa fa-circle-o"></i> Manage Cooling System</a></li>
                    <li class="{{ Request::is('dropdowns/coverages') ? 'active' : '' }}"><a href="{{ route('coverages.index') }}"><i class="fa fa-circle-o"></i> Manage Coverage</a></li>
                    <li class="{{ Request::is('dropdowns/cylinders') ? 'active' : '' }}"><a href="{{ route('cylinders.index') }}"><i class="fa fa-circle-o"></i> Manage Cylinder</a></li>
                    <li class="{{ Request::is('dropdowns/displacements') ? 'active' : '' }}"><a href="{{ route('displacements.index') }}"><i class="fa fa-circle-o"></i> Manage Displacement</a></li>
                    <li class="{{ Request::is('dropdowns/displacement-ranges') ? 'active' : '' }}"><a href="{{ route('displacement-ranges.index') }}"><i class="fa fa-circle-o"></i> Manage Displacement Range</a></li>
                    <li class="{{ Request::is('dropdowns/drive-types') ? 'active' : '' }}"><a href="{{ route('drive-types.index') }}"><i class="fa fa-circle-o"></i> Manage Drive Type</a></li>
                    <li class="{{ Request::is('dropdowns/engine-types') ? 'active' : '' }}"><a href="{{ route('engine-types.index') }}"><i class="fa fa-circle-o"></i> Manage Engine Type</a></li>
                    <li class="{{ Request::is('dropdowns/exterior-features') ? 'active' : '' }}"><a href="{{ route('exterior-features.index') }}"><i class="fa fa-circle-o"></i> Manage Exterior Feature</a></li>
                    <li class="{{ Request::is('dropdowns/front-brakes') ? 'active' : '' }}"><a href="{{ route('front-brakes.index') }}"><i class="fa fa-circle-o"></i> Manage Front Brake</a></li>
                    <li class="{{ Request::is('dropdowns/fuel-types') ? 'active' : '' }}"><a href="{{ route('fuel-types.index') }}"><i class="fa fa-circle-o"></i> Manage Fuel Type</a></li>
                    <li class="{{ Request::is('dropdowns/gear-boxes') ? 'active' : '' }}"><a href="{{ route('gear-boxes.index') }}"><i class="fa fa-circle-o"></i> Manage Gear Box</a></li>
                    <li class="{{ Request::is('dropdowns/ground-clearances') ? 'active' : '' }}"><a href="{{ route('ground-clearances.index') }}"><i class="fa fa-circle-o"></i> Manage Ground Clearance</a></li>
                    <li class="{{ Request::is('dropdowns/interior-features') ? 'active' : '' }}"><a href="{{ route('interior-features.index') }}"><i class="fa fa-circle-o"></i> Manage Interior Feature</a></li>
                    <li class="{{ Request::is('dropdowns/insurance-features') ? 'active' : '' }}"><a href="{{ route('insurance-features.index') }}"><i class="fa fa-circle-o"></i> Manage Insurance Feature</a></li>
                    <li class="{{ Request::is('dropdowns/key-features') ? 'active' : '' }}"><a href="{{ route('key-features.index') }}"><i class="fa fa-circle-o"></i> Manage Key Feature</a></li>
                    <li class="{{ Request::is('dropdowns/made-ins') ? 'active' : '' }}"><a href="{{ route('made-ins.index') }}"><i class="fa fa-circle-o"></i> Manage Made-in</a></li>
                    <li class="{{ Request::is('dropdowns/made-origins') ? 'active' : '' }}"><a href="{{ route('made-origins.index') }}"><i class="fa fa-circle-o"></i> Manage Made Origin</a></li>
                    <li class="{{ Request::is('dropdowns/models') ? 'active' : '' }}"><a href="{{ route('models.index') }}"><i class="fa fa-circle-o"></i> Manage Model</a></li>
                    <li class="{{ Request::is('dropdowns/packages') ? 'active' : '' }}"><a href="{{ route('packages.index') }}"><i class="fa fa-circle-o"></i> Manage Package</a></li>
                    <li class="{{ Request::is('dropdowns/pros-conses') ? 'active' : '' }}"><a href="{{ route('pros-conses.index') }}"><i class="fa fa-circle-o"></i> Manage Pros And Cons</a></li>
                    <li class="{{ Request::is('dropdowns/rear-brakes') ? 'active' : '' }}"><a href="{{ route('rear-brakes.index') }}"><i class="fa fa-circle-o"></i> Manage Rear Brake</a></li>
                    <li class="{{ Request::is('dropdowns/safety-securities') ? 'active' : '' }}"><a href="{{ route('safety-securities.index') }}"><i class="fa fa-circle-o"></i> Manage Safety Security</a></li>
                    <li class="{{ Request::is('dropdowns/selling-capacities') ? 'active' : '' }}"><a href="{{ route('selling-capacities.index') }}"><i class="fa fa-circle-o"></i> Manage Selling Capacity</a></li>
                    <li class="{{ Request::is('dropdowns/starting-systems') ? 'active' : '' }}"><a href="{{ route('starting-systems.index') }}"><i class="fa fa-circle-o"></i> Manage Starting System</a></li>
                    <li class="{{ Request::is('dropdowns/transmissions') ? 'active' : '' }}"><a href="{{ route('transmissions.index') }}"><i class="fa fa-circle-o"></i> Manage Transmission</a></li>
                    <li class="{{ Request::is('dropdowns/tyre-types') ? 'active' : '' }}"><a href="{{ route('tyre-types.index') }}"><i class="fa fa-circle-o"></i> Manage Tyre Type</a></li>
                    <li class="{{ Request::is('dropdowns/wheel-bases') ? 'active' : '' }}"><a href="{{ route('wheel-bases.index') }}"><i class="fa fa-circle-o"></i> Manage Wheel Base</a></li>
                    <li class="{{ Request::is('dropdowns/wheel-types') ? 'active' : '' }}"><a href="{{ route('wheel-types.index') }}"><i class="fa fa-circle-o"></i> Manage Wheel Type</a></li>
                    <li class="{{ Request::is('dropdowns/user-types') ? 'active' : '' }}"><a href="{{ route('user-types.index') }}"><i class="fa fa-circle-o"></i> Manage User Type</a></li>
                    <li class="{{ Request::is('dropdowns/what-a-news') ? 'active' : '' }}"><a href="{{ route('what-a-news.index') }}"><i class="fa fa-circle-o"></i> Manage What A New</a></li>
                    <!--<li class="{{ Request::is('dropdowns/within-kms') ? 'active' : '' }}"><a href="{{ route('within-kms.index') }}"><i class="fa fa-circle-o"></i> Manage Within Km</a></li>-->
                </ul>
            </li>
            @endmoderator
            @admin
            <li class="{{ Request::is('permissions') ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}"><i class="fa fa-lock"></i><span>{{ __('Permission') }}</span></a>
            </li>
            @endadmin
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>