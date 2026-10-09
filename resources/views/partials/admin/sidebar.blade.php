<aside class="admin-sidebar" id="adminSidebar">
    <!-- User Profile Card -->
    <div class="sidebar-user-card">
        <div class="sidebar-user-info">
            <h6>{{ auth()->user()->name ?? '' }}</h6>
            <span></span>
        </div>
       <div class="d-flex align-items-end gap-3 w-100">
            <button class="sidebar-toggle-btn ms-auto" id="sidebarToggle" type="button" title="Toggle Sidebar">
                <i class="bi bi-list"></i>
            </button>
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('adminSidebar');
        const toggleBtn = document.getElementById('sidebarToggle');

        if (!sidebar || !toggleBtn) {
            console.log('Sidebar or toggle button not found');
            return;
        }

        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
        });
    });
</script>
