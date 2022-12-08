<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard - Admin</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <!-- Favicon -->
  @include('admin.components.layouts.header')
</head>

<body>
  <div id="app">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Layout container -->
        <!-- Menu -->
        <admin-sidebar></admin-sidebar>
        <!-- / Menu -->
        <div class="layout-page">
          <!-- Navbar -->
          <admin-nav-bar></admin-nav-bar>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('admin-content')
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
  </div>
  @include('admin.components.layouts.footer_script')
</body>

</html>