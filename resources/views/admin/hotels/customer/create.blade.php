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
            <form action="{{ route('admin.hotels.customer.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="order_id" class="form-label">Full Name (from Order)</label>
                    <select class="form-select" id="order_id" name="order_id" required onchange="updateCustomerInfo()">
                        <option value="">Select Full Name</option>
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}" data-contact="{{ $order->contactNumber }}" data-email="{{ $order->email }}">
                                {{ $order->fullname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Identity Type</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identityType" id="ktp" value="KTP" required 
                            {{ old('identityType') == 'KTP' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ktp">KTP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identityType" id="sim" value="SIM" required 
                            {{ old('identityType') == 'SIM' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sim">SIM</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identityType" id="passport" value="Passport" required 
                            {{ old('identityType') == 'Passport' ? 'checked' : '' }}>
                        <label class="form-check-label" for="passport">Passport</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="identityNumber" class="form-label">Identity Number</label>
                    <input type="text" class="form-control" id="identityNumber" name="identityNumber" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function updateCustomerInfo() {
        const select = document.getElementById('order_id');
        const selectedOption = select.options[select.selectedIndex];

        // Debugging untuk memeriksa nilai yang diambil
        console.log("Selected Order ID:", selectedOption.value);
        console.log("Selected Order Text:", selectedOption.text);
        
        // Ambil contactNumber dan email dari data attribute
        const contactNumber = selectedOption.getAttribute('data-contact');
        const email = selectedOption.getAttribute('data-email');

        console.log("Contact Number:", contactNumber); // Debug
        console.log("Email:", email); // Debug

        // Set nilai ke input contactNumber dan email
        document.getElementById('contactNumber').value = contactNumber !== null ? contactNumber : '';
        document.getElementById('email').value = email !== null ? email : '';
    }
</script>



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