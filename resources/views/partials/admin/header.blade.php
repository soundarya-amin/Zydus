<nav class="admin-navbar">
    <div class="navbar-brand-wrapper">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo-text">
            <img src="{{ asset('images/Rxpont logo.png') }}" alt="RxPONT Logo" class="logo-img" width="100" height="50"/>
        </a>
    </div>

    <div class="navbar-menu-wrapper">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle-btn" id="sidebarToggle" type="button" title="Toggle Sidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <ul class="navbar-nav-right">
            <!-- User Profile Dropdown -->
            <li class="nav-item dropdown">
                <span class="d-none d-sm-inline">{{ auth()->user()->full_name ?? ' ' }}</span>
            </li>

            <!-- Fullscreen Toggle -->
            <li class="nav-item d-none d-md-block">
                <a class="nav-icon-btn" href="#" id="fullscreenToggle" title="Toggle Fullscreen">
                    <i class="bi bi-arrows-fullscreen"></i>
                </a>
            </li>

            <!-- Messages -->

            <!-- Notifications -->
            <!-- <li class="nav-item">
                <a class="nav-icon-btn" href="#" title="Notifications">
                    <i class="bi bi-bell"></i>
                    <span class="badge-indicator bg-info"></span>
                </a>
            </li> -->

            <!-- Power Logout -->
            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-icon-btn border-0 bg-transparent" title="Logout">
                        <i class="bi bi-power text-danger"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
