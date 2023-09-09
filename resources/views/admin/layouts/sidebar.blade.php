<div class="navbar-bg"></div>

<!-- Navbar starts -->
@include('admin.layouts.navbar')
<!-- Navbar ends -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('view.home') }}">Stisla</a>
            {{-- <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('view.home') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <li><a class="nav-link" href="{{ route('admin.property.index') }}"><i class="far fa-square"></i> <span>Properties</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.blog.index') }}"><i class="far fa-square"></i> <span>Blogs</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.post-enquiry.index') }}"><i class="far fa-square"></i> <span>Messages</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Sub-Navigations</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.about.edit', ['about' => 1]) }}">About</a></li>
                    <li><a class="nav-link" href="{{ route('admin.agent.index') }}">Agents</a></li>

                </ul>
            </li>

        </ul>

    </aside>
</div>
