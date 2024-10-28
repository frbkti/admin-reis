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
            <form action="{{ route('admin.hotels.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Identity Type</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identityType" id="ktp" value="KTP" required 
                            {{ old('identityType', $customer->identityType) == 'KTP' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ktp">KTP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identityType" id="sim" value="SIM" required 
                            {{ old('identityType', $customer->identityType) == 'SIM' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sim">SIM</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identityType" id="passport" value="Passport" required 
                            {{ old('identityType', $customer->identityType) == 'Passport' ? 'checked' : '' }}>
                        <label class="form-check-label" for="passport">Passport</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="identityNumber" class="form-label">Identity Number</label>
                    <input type="text" class="form-control" id="identityNumber" name="identityNumber" value="{{ old('identityNumber', $customer->identityNumber) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
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