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
      <div class="container-fluid">
    <div class="border shadow">
        <div class="card-body p-5">
        <form action="{{ route('admin.hotels.informasi.update', $hotelInformasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                    <label for="location" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="hotelName" name="hotelName" value="{{ old('hotelName', $hotelInformasi->hotelName) }}" required>
                </div>
                
                
                
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $hotelInformasi->location) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $hotelInformasi->description) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="startingPrice" class="form-label">Starting Price</label>
                    <input type="number" class="form-control" id="startingPrice" name="startingPrice" value="{{ old('startingPrice', $hotelInformasi->startingPrice) }}" step="0.01" required>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $hotelInformasi->price) }}" step="0.01" required>
                </div>
                
                <div class="mb-3">
                    <label for="gambar" class="form-label">Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <small class="form-text text-muted">Leave empty to keep the current image.</small>
                </div>
                
                <div class="mb-3">
                    <label for="checkInTime" class="form-label">Check-In Time</label>
                    <input type="time" class="form-control" id="checkInTime" name="checkInTime" value="{{ old('checkInTime', $hotelInformasi->checkInTime) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="checkOutTime" class="form-label">Check-Out Time</label>
                    <input type="time" class="form-control" id="checkOutTime" name="checkOutTime" value="{{ old('checkOutTime', $hotelInformasi->checkOutTime) }}" required>
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