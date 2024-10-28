@include('admin.villaresort.layouts.app')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('admin.villaresort.layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.villaresort.layouts.header')

      <!--  Header End -->

      <!-- content -->
      @include('admin.villaresort.layouts.content')
      <!-- end content -->
    </div>
  </div>
 <script src="{{ asset('adminhotel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('adminhotel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminhotel/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('adminhotel/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('adminhotel/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminhotel/assets/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>