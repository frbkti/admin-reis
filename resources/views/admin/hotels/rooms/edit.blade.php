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
            <form action="{{ route('admin.hotels.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="roomTypeName" class="form-label">Room Type Name</label>
                <input type="text" class="form-control" id="roomTypeName" name="roomTypeName" value="{{ old('roomTypeName', $room->roomTypeName) }}" required>
              </div>

              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $room->price) }}" step="0.01" required>
              </div>

              <div class="mb-3">
                <label for="capacity" class="form-label">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $room->capacity) }}" required>
              </div>

              <div class="mb-3">
                <label for="gambar" class="form-label">Image</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <small class="form-text text-muted">Leave empty to keep the current image.</small>
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $room->description) }}</textarea>
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
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
