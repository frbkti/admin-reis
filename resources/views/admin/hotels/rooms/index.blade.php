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
        <div class="card mt-3 border shadow" style="padding: 30px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title fw-semibold">Hotel Rooms</h5>
                    <!-- Button Create -->
                    <a href="{{ route('admin.hotels.rooms.create') }}" class="btn btn-primary">Add Room</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Id</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Hotel Name</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Room Type</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Price</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Capacity</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Gambar</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Description</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Action</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $room->id }}</h6></td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-1">{{ $room->hotel->hotelName }}</h6></td>
                                <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $room->roomTypeName }}</p></td>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">Rp {{ number_format($room->price, 0, ',', '.') }}</h6></td>
                                <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $room->capacity }}</p></td>
                                <td class="border-bottom-0">
                                    <img src="{{ asset($room->gambar) }}" alt="Gambar Room" class="img-fluid" style="max-width: 100px; height: auto;">
                                </td>
                                <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $room->description }}</p></td>
                                <td class="border-bottom-0">
                                  <a href="{{ route('admin.hotels.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">
                                      <i class="ti ti-pencil"></i> 
                                  </a>
                                  <form action="{{ route('admin.hotels.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">
                                          <i class="ti ti-trash"></i> 
                                      </button>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

</div>

    </div>
  </div>

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-success shadow-lg">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="successModalLabel">
            <i class="bi bi-check-circle-fill me-2"></i>Success!
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <p>{{ session('success') }}</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('adminhotel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/simplebar/dist/simplebar.js') }}"></script>

  @if(session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var successModal = new bootstrap.Modal(document.getElementById('successModal'), {
        keyboard: false
      });
      successModal.show();
    });
  </script>
  @endif
</body>

</html>
