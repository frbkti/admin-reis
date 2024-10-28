<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1E3A8A; height: 50px; color: white;">
        <a class="navbar-brand" href="/index.html">
            <img src="{{asset('frontendreis/assets/img/logo.png')}}" width="80px" height="40px" class="img-fluid" alt="Responsive image">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white " href="/hotel/index.html">Hotel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/tour/index.html">Tour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/car-bike/index.html">Car Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/event/index.html">Event</a>
                </li>
            </ul>
            <div class="d-flex align-items-center ms-auto mr-3">
              <span class="text-white me-2">Hello, Mr. Jack</span>
              <div class="dropdown">
                  <a class="navbar-brand "  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="{{asset('frontendreis/assets/img/p.jpg')}}" width="30" height="30" class="rounded-circle" alt="Profile">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end mr-4"  aria-labelledby="navbarDropdown">
                      <li class="dropdown-header">
                          <img src="{{asset('frontendreis/assets/img/p.jpg')}}" width="50" height="50" alt="Profile Image">
                          <p class="mb-0">Mr. Jack</p>
                          <small>+62 345 678 910<br>mrjack@gmail.com</small>
                      </li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-star"></i> Point</a></li>
                      <li><a class="dropdown-item" href="/profile/editprofile.html"><i class="bi bi-person"></i> Edit Profile</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-credit-card"></i> My Card</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-bag"></i> My Order</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-currency-dollar"></i> Refund</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle"></i> Info Promotion</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-key"></i> Set Password</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-power"></i> Log Out</a></li>
                  </ul>
              </div>
          </div>
        </div>
    </nav>