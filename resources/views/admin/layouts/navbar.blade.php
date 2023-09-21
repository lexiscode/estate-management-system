<nav class="navbar navbar-expand-lg main-navbar">

    <!-- Toggle sidebar -->
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>

    <ul class="navbar-nav navbar-right ml-auto">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>

                <div class="dropdown-list-content dropdown-list-message">

                    @if ($post_enquiries->isEmpty())
                        <p>No message found.</p>
                    @else
                        @foreach ($post_enquiries as $post_enquiry)
                            <a href="{{ route('admin.post-enquiry.index') }}" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                                    <div class="is-online"></div>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>{{ $post_enquiry->name }}</b>
                                    <p>{{ $post_enquiry->message }}</p>
                                    <div class="time">
                                        <!--using Laravel's inbuilt Carbon library-->
                                        {{ $post_enquiry->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ route('admin.post-enquiry.index') }}">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->guard('admin')->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                @if (hasPermission(['setting index', 'general-seo-setting update']))
                <a href="{{ route('admin.setting.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                @endif

                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <a href="#" onclick="event.preventDefault();
                    this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
