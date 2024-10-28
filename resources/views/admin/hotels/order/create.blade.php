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
            <form onsubmit="return updateTotalAmountBeforeSubmit();" method="POST" action="{{ route('admin.hotels.order.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="hotel_id" class="form-label">Hotel Name</label>
                    <select class="form-select" id="hotel_id" name="hotel_id" required>
                        <option value="">Select Hotel</option>
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->hotelName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="room_id" class="form-label">Room Type</label>
                    <select class="form-select" id="room_id" name="room_id" required onchange="updateRoomDetails()">
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" data-price="{{ $room->price }}" data-image="{{ asset($room->gambar) }}">{{ $room->roomTypeName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>

                <div class="mb-3">
                    <label for="contactnumber" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactnumber" name="contactnumber" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="checkInDate" class="form-label">Check-In Date</label>
                    <input type="date" class="form-control" id="checkInDate" name="checkInDate" required onchange="calculateTotalAmount()">
                </div>

                <div class="mb-3">
                    <label for="checkOutDate" class="form-label">Check-Out Date</label>
                    <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" required onchange="calculateTotalAmount()">
                </div>

                <div class="mb-3">
                    <label for="room_price" class="form-label">Room Price</label>
                    <input type="number" class="form-control" id="room_price" name="room_price" step="0.01" required readonly>
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount" value="0" min="0" max="100" oninput="calculateTotalAmount()">
                </div>

                <div class="mb-3">
                    <label for="totalAmount" class="form-label">Total Amount</label>
                    <input type="text" class="form-control" id="totalAmount" name="totalAmount" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function updateRoomDetails() {
        const roomSelect = document.getElementById('room_id');
        const roomPriceInput = document.getElementById('room_price');
        const selectedOption = roomSelect.options[roomSelect.selectedIndex];

       
        roomPriceInput.value = selectedOption.dataset.price || '';
        calculateTotalAmount();
    }

    function calculateTotalAmount() {
        const checkInDate = new Date(document.getElementById('checkInDate').value);
        const checkOutDate = new Date(document.getElementById('checkOutDate').value);
        const roomPrice = parseFloat(document.getElementById('room_price').value) || 0;
        const discount = parseFloat(document.getElementById('discount').value) || 0;

        if (checkInDate && checkOutDate && checkInDate < checkOutDate) {
            const timeDiff = checkOutDate - checkInDate; 
            const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
            let totalAmount = daysDiff * roomPrice; 

           
            if (discount > 0) {
                totalAmount -= (totalAmount * (discount / 100));
            }

            document.getElementById('totalAmount').value = totalAmount.toFixed(2); 
        } else {
            document.getElementById('totalAmount').value = ''; 
        }
    }

    function updateTotalAmountBeforeSubmit() {
        calculateTotalAmount(); 
        return true; 
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