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
            <!-- Pastikan menggunakan route yang benar untuk update -->
            <form action="{{ route('admin.hotels.policy.update', $policy->id) }}" method="POST">
              @csrf
              @method('PUT')

              <!-- Field for Policy Name -->
              <div class="mb-3">
                <label for="policyname" class="form-label">Title</label>
                <input type="text" class="form-control" id="policyname" name="policyname" 
                       value="{{ old('policyname', $policy->policyname) }}" required>
              </div>

              <!-- Field for Description -->
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" 
                       value="{{ old('description', $policy->description) }}" required>
              </div>

              <!-- Field for Check-in Procedure -->
              <div class="mb-3">
                <label for="checkinprocedure" class="form-label">Check-in Procedure</label>
                <input type="text" class="form-control" id="checkinprocedure" name="checkinprocedure" 
                       value="{{ old('checkinprocedure', $policy->checkinprocedure) }}" required>
              </div>

              <!-- Field for Check-out Procedure -->
              <div class="mb-3">
                <label for="checkoutprocedure" class="form-label">Check-out Procedure</label>
                <input type="text" class="form-control" id="checkoutprocedure" name="checkoutprocedure" 
                       value="{{ old('checkoutprocedure', $policy->checkoutprocedure) }}" required>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
      <!-- End content -->
    </div>
  </div>

 
      <!-- End content -->


  <script src="{{ asset('adminhotel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>
