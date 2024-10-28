<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('adminhotel/assets/images/logos/logo.png') }}" />
  <link rel="stylesheet" href="{{ asset('adminhotel/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('adminhotel/assets/images/logos/logo.png') }}" width="180" alt="Logo">
                </a>
                <p class="text-center">Create Your Admin Account</p>

                <!-- Form Register -->
                <form action="{{ route('admin.register') }}" method="POST">
                      @csrf
                    <!-- Input untuk Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <!-- Input untuk Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Input untuk Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Input untuk Konfirmasi Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <!-- Pilihan untuk Admin Type -->
                    <div class="mb-4">
                        <label for="admin_type" class="form-label">Select Admin Type</label>
                        <select class="form-control" id="admin_type" name="admin_type" required>
                        <option value="hotel" {{ old('admin_type') == 'hotel' ? 'selected' : '' }}> Hotel</option>
                        <option value="villa_resort" {{ old('admin_type') == 'villa_resort' ? 'selected' : '' }}> Villa Resort</option>
                        <option value="car_bike_rent" {{ old('admin_type') == 'car_bike_rent' ? 'selected' : '' }}> Car & Bike Rent</option>
                        <option value="cinema" {{ old('admin_type') == 'cinema' ? 'selected' : '' }}> Cinema</option>
                        <option value="event" {{ old('admin_type') == 'event' ? 'selected' : '' }}> Event</option>
                        <option value="tour" {{ old('admin_type') == 'tour' ? 'selected' : '' }}> Tour</option>
                        <option value="airplane" {{ old('admin_type') == 'airplane' ? 'selected' : '' }}> Airplane</option>
                        <option value="cruiseship-fastboat" {{ old('admin_type') == 'cruiseship_fastboat' ? 'selected' : '' }}> Cruise Ship & Fast Boat</option>

                        </select>
                    </div>

                    <!-- Tampilkan Error jika ada -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                    </form>


                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                  <a class="text-primary fw-bold ms-2" href="{{ route('admin.login') }}">Sign In</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('adminhotel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('adminhotel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
