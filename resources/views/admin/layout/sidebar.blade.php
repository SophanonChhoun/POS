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
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/dealer*' ? 'active' : '') }}" href="{{ url('admin/dealer/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Dealer</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/buyer*' ? 'active' : '') }}" href="{{ url('admin/buyer/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                        <span class="hide-menu">Buyer</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/template*' ? 'active' : '') }}" href="{{ url('admin/template/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-images" aria-hidden="true"></i>
                        <span class="hide-menu">Template</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/category*' ? 'active' : '') }}" href="{{ url('admin/category/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/subcategory*' ? 'active' : '') }}" href="{{ url('admin/subcategory/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-hospital-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Sub Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/product*' ? 'active' : '') }}" href="{{ url('admin/product/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-magic" aria-hidden="true"></i>
                        <span class="hide-menu">Products</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/import*' ? 'active' : '') }}" href="{{ url('admin/import/list') }}"
                       aria-expanded="false">
                        <i class="fab fa-product-hunt" aria-hidden="true"></i>
                        <span class="hide-menu">Imports</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/sale*' ? 'active' : '') }}" href="{{ url('admin/sale/list') }}"
                       aria-expanded="false">
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                        <span class="hide-menu">Sales</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/banner*' ? 'active' : '') }}" href="{{ url('admin/banner/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        <span class="hide-menu">Banner</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/slider*' ? 'active' : '') }}" href="{{ url('admin/slider/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/contact*' ? 'active' : '') }}" href="{{ url('admin/contact/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="hide-menu">Contact Location</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/promotion*' ? 'active' : '') }}" href="{{ url('admin/promotion/list') }}"
                       aria-expanded="false">
                        <i class="fa fa-mars" aria-hidden="true"></i>
                        <span class="hide-menu">Promotion</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/currency*' ? 'active' : '') }}" href="{{ url('admin/currency/list') }}"
                       aria-expanded="false">
                        <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                        <span class="hide-menu">Currency</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/faq*' ? 'active' : '') }}" href="{{ url('admin/faq/list') }}"
                       aria-expanded="false">
                        <i class="fas fa-question" aria-hidden="true"></i>
                        <span class="hide-menu">FAQ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->is('admin/faq_question*' ? 'active' : '') }}" href="{{ url('admin/faq_question/list') }}"
                       aria-expanded="false">
                        <i class="fas fa-question-circle" aria-hidden="true"></i>
                        <span class="hide-menu">FAQ Question</span>
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
