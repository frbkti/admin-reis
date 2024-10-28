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
                    <form action="{{ route('admin.hotels.review.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                       

                        <!-- Field for Reviewer Name -->
                        <div class="mb-3">
                            <label for="reviewerName" class="form-label">Reviewer Name</label>
                            <input type="text" class="form-control" id="reviewerName" name="reviewerName" 
                                value="{{ old('reviewerName', $review->reviewerName) }}" required>
                        </div>

                        <!-- Field for Review Date -->
                        <div class="mb-3">
                            <label for="reviewDate" class="form-label">Review Date</label>
                            <input type="date" class="form-control" id="reviewDate" name="reviewDate" 
                                value="{{ old('reviewDate', $review->reviewDate) }}" required>
                        </div>

                        <!-- Field for Rating -->
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" 
                                value="{{ old('rating', $review->rating) }}" required>
                        </div>

                        <!-- Field for Review Text -->
                        <div class="mb-3">
                            <label for="reviewText" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="reviewText" name="reviewText" rows="3" required>{{ old('reviewText', $review->reviewText) }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

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
