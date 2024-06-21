<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="sidebar" id="sidebar">
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/img/logo/logo-white-text.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('owner-venue.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-map-pin"></i>
                            </span>
                            <span class="hide-menu">Venues</span>
                        </a>
                    </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MAIN FEATURES</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('owner-field.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-soccer-field"></i>
                        </span>
                        <span class="hide-menu">Fields</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('owner-order.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-receipt"></i>
                        </span>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('owner-transaction.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-arrows-sort"></i>
                        </span>
                        <span class="hide-menu">Transactions</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
