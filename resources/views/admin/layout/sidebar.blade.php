<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/dashboard*' ? 'active' : '') }}" href="{{ url('admin/dashboard') }}"
                       aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/user*' ? 'active' : '') }}" href="{{ url('admin/user/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/template*' ? 'active' : '') }}" href="{{ url('admin/template/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-images" aria-hidden="true"></i>
                        <span class="hide-menu">Template</span>
                    </a>
                </li>
                <li class="text-center p-20 upgrade-btn">
                    <a href="{{ url('admin/logout') }}"
                       class="btn d-grid btn-danger text-white">Logout</a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
