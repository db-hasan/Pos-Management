@include('backend.header');

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <img src="{{ asset('backend/img/favicon.jpg') }}" alt="">
                <span class="d-none d-lg-block">Logo Here</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="">
                        <i class="bi bi-shop-window"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="">
                        <i class="bi bi-cart3"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile"
                            class="rounded-circle">
                        @if (auth()->check())
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                        @endif

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            @can('dashboard-index')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#categories" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="categories" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i class="bi bi-circle"></i><span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('varision.index') }}">
                            <i class="bi bi-circle"></i><span>Varision</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('attributes.index') }}">
                            <i class="bi bi-circle"></i><span>Attributes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('value.index') }}">
                            <i class="bi bi-circle"></i><span>Attributes Value</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#products" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('product.index') }}">
                            <i class="bi bi-circle"></i><span>Product List</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('product.inactive') }}">
                            <i class="bi bi-circle"></i><span>InActive</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.create')}}">
                            <i class="bi bi-circle"></i><span>Add Product</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#stock" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-shop-window"></i><span>Stock</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="stock" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('warehouse.index') }}">
                            <i class="bi bi-circle"></i><span>Warehouse</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('stock.create')}}">
                            <i class="bi bi-circle"></i><span>Add Stock</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('lowstock.index')}}">
                            <i class="bi bi-circle"></i><span>Low Stock</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Stock Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Stock Transfer</span>
                        </a>
                    </li>

                    
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-cart3"></i>
                    <span>Sales</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-arrow-return-left"></i>
                    <span>Return</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-dash-circle"></i>
                    <span>Damage</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#report" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="report" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Sales Report</span>
                        </a>
                    </li>
                      
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Return Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Damage Report</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#accounts" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bank"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="accounts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('othersprofit.index') }}">
                            <i class="bi bi-circle"></i><span>Add Profits</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('costtype.index') }}">
                            <i class="bi bi-circle"></i><span>Cost Type</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('costing.index') }}">
                            <i class="bi bi-circle"></i><span>Add Costing</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Profits Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Costing Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Banance Sheet</span>
                        </a>
                    </li>
                </ul>
            </li>
            

            @can('role-index')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('role.index') }}">
                        <i class="bi bi-shield-lock"></i>
                        <span>Permission</span>
                    </a>
                </li>
            @endcan

            @can('user-index')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Manage Role</span>
                    </a>
                </li>
            @endcan

            @can('profle-update')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('profle.update') }}">
                        <i class="bi bi-database-lock"></i>
                        <span>Password</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('logout') }}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar-->

    {{-- ------------content part-------------- --}}
    @yield('content')
    {{-- ------------content part-------------- --}}

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SOFTxONE</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://softxone.com/">SOFTxONE Limited</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('backend.footer');
</body>

</html>
