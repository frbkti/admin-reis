

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
            <form action="{{ route('admin.villaresort.rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="villaresort_id" class="form-label">Select Villa Resort</label>
                    <select class="form-select" id="villaresort_id" name="villaresort_id" required>
                        @if($villaResorts->isNotEmpty())
                            <option value="" disabled selected>-- Select Villa Resort --</option> <!-- Placeholder -->
                            @foreach ($villaResorts as $villaresort)
                                <option value="{{ $villaresort->id }}">{{ $villaresort->villaresortname }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No villa resorts available</option> <!-- Jika tidak ada data villa resort -->
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="roomTypeName" class="form-label">Room Type Name</label>
                    <input type="text" class="form-control" id="roomTypeName" name="roomTypeName" required>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                
                <div class="mb-3">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="text" class="form-control" id="capacity" name="capacity" required>
                </div>
                
                <div class="mb-3">
                    <label for="gambar" class="form-label">Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
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
