<nav class="admin-navbar">
    <div class="navbar-brand-wrapper">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo-text">
            <i class="bi bi-layers-fill brand-logo-icon"></i>
            <span>RxPONT</span>
        </a>
    </div>

    <div class="navbar-menu-wrapper">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle-btn" id="sidebarToggle" type="button" title="Toggle Sidebar">
                <i class="bi bi-list"></i>
            </button>

            <div class="navbar-search d-none d-md-block">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search projects or patients..." id="dashboardSearch">
            </div>
        </div>

        <ul class="navbar-nav-right">
            <!-- User Profile Dropdown -->
            <li class="nav-item dropdown">
                <a class="user-profile-dropdown dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=80" alt="Admin Profile">
                    <span class="d-none d-sm-inline">{{ auth()->user()->name ?? 'David Greymaax' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                    <li><a class="dropdown-item py-2" href="#"><i class="bi bi-person me-2 text-muted"></i> Activity Log</a></li>
                    <li><a class="dropdown-item py-2" href="{{ url('/') }}" target="_blank"><i class="bi bi-globe me-2 text-muted"></i> View Website</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <!-- <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item py-2 text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                            </button>
                        </form>
                    </li> -->
                </ul>
            </li>

            <!-- Fullscreen Toggle -->
            <li class="nav-item d-none d-md-block">
                <a class="nav-icon-btn" href="#" id="fullscreenToggle" title="Toggle Fullscreen">
                    <i class="bi bi-arrows-fullscreen"></i>
                </a>
            </li>

            <!-- Messages -->
            <li class="nav-item">
                <a class="nav-icon-btn" href="#" title="Messages">
                    <i class="bi bi-envelope"></i>
                    <span class="badge-indicator bg-danger"></span>
                </a>
            </li>

            <!-- Notifications -->
            <li class="nav-item">
                <a class="nav-icon-btn" href="#" title="Notifications">
                    <i class="bi bi-bell"></i>
                    <span class="badge-indicator bg-info"></span>
                </a>
            </li>

            <!-- Power Logout -->
            <!-- <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-icon-btn border-0 bg-transparent" title="Logout">
                        <i class="bi bi-power text-danger"></i>
                    </button>
                </form>
            </li> -->
        </ul>
    </div>
</nav>
