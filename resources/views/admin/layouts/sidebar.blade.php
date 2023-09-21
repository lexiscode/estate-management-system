<div class="navbar-bg"></div>

<!-- Navbar starts -->
@include('admin.layouts.navbar')
<!-- Navbar ends -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('view.home') }}">{{ $settings['site_name'] }}</a>
            {{-- <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('view.home') }}">B-RE</a>
        </div>
        <ul class="sidebar-menu">

            <li class="dropdown">
                <li class="{{ setSidebarActive(['admin.dashboard.*']) }}">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
            </li>


            <li class="menu-header">Manage Rent Records</li>
            @php
            $dropdownActiveClass = setSidebarActive(['admin.remit.*', 'admin.statement.*']);
            @endphp
            <li class="dropdown {{ $dropdownActiveClass ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-receipt"></i>
                    <span>Manage Rent Records</span></a>
                <ul class="dropdown-menu">
                    @if (hasPermission(['remittance index', 'remittance create', 'remittance show', 'remittance update', 'remittance delete']))
                    <li class="{{ setSidebarActive(['admin.remit.*']) }}"><a class="nav-link" href="{{ route('admin.remit.index') }}"><i class="fas fa-file-invoice-dollar"></i> <span>Remittance</span></a></li>
                    @endif
                    @if (hasPermission(['statement index', 'statement index', 'statement pdf', 'statement excel']))
                    <li class="{{ setSidebarActive(['admin.statement.*']) }}"><a class="nav-link" href="{{ route('admin.statement.index') }}"><i class="fas fa-file-invoice"></i> <span>Statements</span></a></li>
                    @endif
                </ul>
            </li>



            <li class="menu-header">Notifications</li>
            @if (hasPermission(['message index', 'message delete']))
            <li class="{{ setSidebarActive(['admin.post-enquiry.*']) }}"><a class="nav-link" href="{{ route('admin.post-enquiry.index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>
            @endif


            <li class="menu-header">Access Management</li>
            @php
            $accessManagementDropdownActiveClass = setSidebarActive(['admin.role-user.*', 'admin.role.*']);
            @endphp
            <li class="dropdown {{ $accessManagementDropdownActiveClass ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-unlock-alt"></i>
                    <span>Roles & Permissions</span></a>
                <ul class="dropdown-menu">
                    @if (hasPermission(['user role index', 'user role create', 'user role show', 'user role update', 'user role delete']))
                    <li class="{{ setSidebarActive(['admin.role-user.*']) }}"><a class="nav-link" href="{{ route('admin.role-user.index') }}"><i class="fas fa-user-shield"></i>Role Users</span></a></li>
                    @endif
                    @if (hasPermission(['access management index', 'access management create', 'access management show', 'access management update', 'access management delete']))
                    <li class="{{ setSidebarActive(['admin.role.*']) }}"><a class="nav-link" href="{{ route('admin.role.index') }}"><i class="fas fa-user-lock"></i><span>Role & Permission</span></a></li>
                    @endif
                </ul>
            </li>


            <li class="menu-header">Navigation Menu</li>
            @if (hasPermission(['property index', 'property create', 'property show', 'property update', 'property delete']))
            <li class="{{ setSidebarActive(['admin.property.*']) }}"><a class="nav-link" href="{{ route('admin.property.index') }}"><i class="fas fa-home"></i> <span>Properties</span></a></li>
            @endif
            @if (hasPermission(['about update']))
            <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link" href="{{ route('admin.about.edit', ['about' => 1]) }}"><i class="fas fa-eject"></i> <span>About</span></a></li>
            @endif
            @if (hasPermission(['agent index', 'agent create', 'agent show', 'agent update', 'agent delete']))
            <li class="{{ setSidebarActive(['admin.agent.*']) }}"><a class="nav-link" href="{{ route('admin.agent.index') }}"><i class="fas fa-users-cog"></i> <span>Agents</span></a></li>
            @endif
            @if (hasPermission(['blog index', 'blog create', 'blog show', 'blog update', 'blog delete']))
            <li class="{{ setSidebarActive(['admin.blog.*']) }}"><a class="nav-link" href="{{ route('admin.blog.index') }}"><i class="fab fa-blogger"></i> <span>Blogs</span></a></li>
            @endif


            <li class="menu-header">Manage Site Settings</li>
            @if (hasPermission(['setting index', 'general-seo-setting create']))
            <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            @endif

        </ul>

    </aside>
</div>

