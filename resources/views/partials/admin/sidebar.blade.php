<aside class="admin-sidebar" id="adminSidebar">
    <!-- User Profile Card -->
    <div class="sidebar-user-card">
        <div class="sidebar-user-info">
            <h6>{{ auth()->user()->name ?? '' }}</h6>
            <span></span>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <div class="nav-left">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.patients.index') ? 'active' : '' }}" href="{{ route('admin.patients.index') }}">
                <div class="nav-left">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>New Patients</span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.nurses.index') ? 'active' : '' }}" href="{{ route('admin.nurses.index') }}">
                <div class="nav-left">
                    <i class="fa-solid fa-user-nurse menu-icon"></i>
                    <span>Nurse Assigned</span>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.patients.completed') ? 'active' : '' }}" href="{{ route('admin.patients.completed') }}">
                <div class="nav-left">
                    <i class="fa-solid fa-user-check menu-icon"></i>
                    <span>Completed</span>
                </div>
            </a>
        </li>
    </ul>
</aside>
