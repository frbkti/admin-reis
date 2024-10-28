@include('admin.hotels.layouts.app')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('admin.hotels.layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.hotels.layouts.header')

      <!--  Header End -->

      <!-- content -->
      <div class="container-fluid">
        <div class="border shadow">
            <div class="card-body p-5">
                <form action="{{ route('admin.hotels.policy.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="policyname" class="form-label">Title</label>
                        <input type="text" class="form-control" id="policyname" name="policyname" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="checkinprocedure" class="form-label">Check-in Procedure</label>
                        <input type="text" class="form-control" id="checkinprocedure" name="checkinprocedure" required>
                    </div>
                    <div class="mb-3">
                        <label for="checkoutprocedure" class="form-label">Check-out Procedure</label>
                        <input type="text" class="form-control" id="checkoutprocedure" name="checkoutprocedure" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


      

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