<aside class="admin-sidebar" id="adminSidebar">
    <!-- User Profile Card -->
    <div class="sidebar-user-card">
        <div class="sidebar-user-avatar">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=80" alt="Admin Profile">
            <span class="status-online-dot"></span>
        </div>
        <!-- <div class="sidebar-user-info">
            <h6>{{ auth()->user()->name ?? 'David Grey. H' }}</h6>
            <span>Project Manager</span>
        </div> -->
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
                    <span>Patient Enrollments</span>
                </div>
            </a>
        </li>
    </ul>
</aside>
