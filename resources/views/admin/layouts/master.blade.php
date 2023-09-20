<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard &mdash; Bootstrap RealEstate</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <!-- Includes the sidebar layout here-->
      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">

        <!-- Dashboard section -->
        @yield('dashboard')

        <!-- Admin Profile section -->
        @yield('index-profile')

        <!-- Properties section -->
        @yield('index-properties')
        @yield('create-properties')
        @yield('show-property-details')
        @yield('update-properties')
        @yield('search-properties')

        <!-- Blogs section -->
        @yield('index-blogs')
        @yield('create-blogs')
        @yield('show-blog-details')
        @yield('update-blogs')

        <!-- Messages section -->
        @yield('post_enquiries')

        <!-- About Us section -->
        @yield('about')

        <!-- Agents section -->
        @yield('index-agents')
        @yield('create-agents')
        @yield('show-agent-details')
        @yield('update-agents')
        @yield('search-agents')

        <!-- Remittance section -->
        @yield('index-remittances')
        @yield('create-remittances')
        @yield('show-remittances')
        @yield('update-remittances')
        @yield('search-remittances')

        <!-- Tenant section-->
        @yield('index-tenant-records')
        @yield('create-tenant-records')

        <!-- Roles and Permissions section-->
        @yield('index-roles')
        @yield('create-roles')
        @yield('update-roles')

        <!-- Role Users Management-->
        @yield('index-role-users')
        @yield('create-role-users')
        @yield('update-role-users')


        </div>
        <footer class="main-footer">
            <div class="footer-left">
            Copyright &copy; 2023 <div class="bullet"></div> Designed By <a href="https://nauval.in/">Nwokorie Alexander V.</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/index-0.js') }}"></script>

    <script src="{{ asset('admin/assets/js/page/features-post-create.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

    <!-- Filter search JS File -->
    <script src="{{ asset("admin/assets/js/filter.js") }}"></script>

    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
    @stack('scripts') // renders js code in a specific blade view file only

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @include('sweetalert::alert')

</body>
</html>
