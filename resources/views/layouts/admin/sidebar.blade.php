<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="sidebar" id="sidebar">
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
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
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">DATA MASTER</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('schedule.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar-time"></i>
                        </span>
                        <span class="hide-menu">Schedules</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('sport.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-ball-football"></i>
                        </span>
                        <span class="hide-menu">Sports</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('venue.index') }}" aria-expanded="false">
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
                    <a class="sidebar-link" href="{{ route('field.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-soccer-field"></i>
                        </span>
                        <span class="hide-menu">Fields</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('order.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-receipt"></i>
                        </span>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('transaction.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-arrows-sort"></i>
                        </span>
                        <span class="hide-menu">Transactions</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">USER</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
