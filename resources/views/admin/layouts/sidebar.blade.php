<div class="navbar-bg"></div>

<!-- Navbar starts -->
@include('admin.layouts.navbar')
<!-- Navbar ends -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('view.home') }}">Bootstrap RealEstate</a>
            {{-- <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('view.home') }}">B-RE</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>


            <li class="menu-header">Manage Rent Records</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Manage Rent Records</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.remit.index') }}"><i class="far fa-square"></i> <span>Remittance</span></a></li>
                    <li><a class="nav-link" href="{{ route('admin.statement.index') }}"><i class="far fa-square"></i> <span>Statements</span></a></li>
                </ul>
            </li>


            <li class="menu-header">Manage Property</li>
            <li><a class="nav-link" href="{{ route('admin.property.index') }}"><i class="far fa-square"></i> <span>Properties</span></a></li>


            <li class="menu-header">Notifications</li>
            <li><a class="nav-link" href="{{ route('admin.post-enquiry.index') }}"><i class="far fa-square"></i> <span>Messages</span></a></li>


            <li class="menu-header">Access Management</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Roles & Permissions</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.role.index') }}"><i class="far fa-square"></i><span>Role & Permission</span></a></li>
                </ul>
            </li>


            <li class="menu-header">Navigation Menu</li>
            <li><a class="nav-link" href="{{ route('admin.about.edit', ['about' => 1]) }}"><i class="far fa-square"></i> <span>About</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.agent.index') }}"><i class="far fa-square"></i> <span>Agents</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.blog.index') }}"><i class="far fa-square"></i> <span>Blogs</span></a></li>

        </ul>

    </aside>
</div>

