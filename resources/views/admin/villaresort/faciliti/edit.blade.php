@include('admin.hotels.layouts.app')

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
       data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('admin.hotels.layouts.sidebar')
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      @include('admin.hotels.layouts.header')
      <!-- Header End -->

      <!-- Content -->
      <div class="container-fluid">
    <div class="border shadow">
        <div class="card-body p-5">
            <form action="{{ route('admin.villaresort.faciliti.update', $facility->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="FacilityName" class="form-label">Facility Name</label>
                    <input type="text" class="form-control" id="FacilityName" name="FacilityName" 
                           value="{{ old('FacilityName', $facility->FacilityName) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Facility</button>
            </form>
        </div>
    </div>
</div>

      <!-- End content -->
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
