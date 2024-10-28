

  

      <!-- content -->
      <div class="container " style="padding: 60px;">
        <!-- Hotel Title and Rating -->
        <section id="information" class="information">
        <div class="row align-items-center">
            <div class="col-md-8">
              @if ($hotel)
              <h3>{{ $hotel->hotelName }}</h3>
              @else
                <h3>Hotel tidak ditemukan</h3>
            @endif             
               <div class="d-flex align-items-center">
                    <span class="text-warning fs-5">★★★★☆</span>
                    <span class="ms-2 text-muted">(4.5/5 from 1,234 reviews)</span>
                </div>
            </div>
        </div>
        </section>

        <!-- Image Gallery -->
        <div class="container mt-1">
            <div class="row">
                <!-- Kolom kiri dengan 4 gambar -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <img src="{{asset('frontendreis/assets/img/h1.png')}}" class="img-fluid rounded small-image" alt="Room Image 1">
                        </div>
                        <div class="col-6 mb-3">
                            <img src="{{asset('frontendreis/assets/img/h4.png')}}" class="img-fluid rounded small-image" alt="Room Image 2">
                        </div>
                        <div class="col-6 mb-3">
                            <img src="{{asset('frontendreis/assets/img/h5.png')}}" class="img-fluid rounded small-image" alt="Room Image 3">
                        </div>
                        <div class="col-6 mb-3">
                            <img src="{{asset('frontendreis/assets/img/h2.png')}}" class="img-fluid rounded small-image" alt="Room Image 4">
                        </div>
                    </div>
                </div>
                <!-- Kolom kanan dengan satu gambar besar -->
                <div class="col-md-4">
                    <img src="{{asset('frontendreis/assets/img/h3.png')}}" class="img-fluid rounded large-image" alt="Room Image Large">
                </div>
            </div>
        </div>
    
        <!-- Navigation Tabs and Price/Book Now Section -->
        <div class="container  p-3 border-shadow rounded">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link  scrollto active " href="#information">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#riviews">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#location">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#facility">Facility</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link scrollto" href="#about">About</a>
                      </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="#policy">Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-items-center">
                    <div>
                        <span class="price-info">Start From</span>
                        @if ($hotel)
                        <span class="text-price"> IDR.{{ $hotel->startingPrice }}</span>   
                      @endif 
                        <br>
                        <span class="price-info ">/room/night</span>
                    </div>
                    <a href="/hotel/hotelroom.html" class="btn btn-primary ms-3">Book Now</a>
                </div>
            </div>
            </div>
        
        
  

          <section id="riviews" class="reviews">
          <div class="riviews mt-4  ">
                      <h2 class="text-large ">
                          <img src="{{asset('frontendreis/assets/img/r.png')}}" width="50" height="50" class="img-fluid" alt="Responsive image">
                          Reviews
                      </h2> 
              <div class="container  ml-5">
                  <div class="row">
                    <!-- Section for main rating and total reviews -->
                    <div class="col-12">
                      <div class="review-rating d-flex align-items-center">
                        <div>
                          <div class="review-score">4.5/5 <span class="text-small">Good</span></div>
                          <div class="text-muted">From 1,234 Reviews</div>
                        </div>
                      </div>
                    </div>
                  </div>
            
                  <div class="row mt-4">
                    <!-- First Review Card -->
                    <div class="col-md-4">
                      <div class="review-card border-shadow">
                        <div class="review-header d-flex justify-content-between">
                          <div>4.5/5</div>
                          <div>20 June 2024</div>
                        </div>
                        <div class="review-body">
                          <p><strong>Mr. Rony</strong></p>
                          <p>Complete facilities, clean rooms</p>
                        </div>
                      </div>
                    </div>
              
                    <!-- Second Review Card -->
                    <div class="col-md-4">
                      <div class="review-card border-shadow">
                        <div class="review-header d-flex justify-content-between">
                          <div>4.5/5</div>
                          <div>20 June 2024</div>
                        </div>
                        <div class="review-body">
                          <p><strong>Mr. Rony</strong></p>
                          <p>Complete facilities, clean rooms</p>
                        </div>
                      </div>
                    </div>
              
                    <!-- Third Review Card -->
                    <div class="col-md-4">
                      <div class="review-card border-shadow">
                        <div class="review-header d-flex justify-content-between">
                          <div>4.5/5</div>
                          <div>20 June 2024</div>
                        </div>
                        <div class="review-body">
                          <p><strong>Mr. Rony</strong></p>
                          <p>Complete facilities, clean rooms</p>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <!-- See All Reviews Button -->
                  <div class="row">
                    <div class="col-12 review-button">
                      <a href="#" class="btn btn-primary">See All Reviews</a>
                    </div>
                  </div>
              </section>

          <div class="line"></div>

    <section id="location" class="location mt-4">
      <div class="riviews mt-4 ">
        <h2 class="text-large ">
            <img src="{{asset('frontendreis/assets/img/l.png')}}" width="50" height="50" class="img-fluid" alt="Responsive image">
            Location
        </h2> 
      <div class="container">
          <div class="row">
              <!-- Bagian iframe Google Maps -->
              <div class="col-md-4 ml-5 ">
                  <iframe 
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.668729511406!2d115.20261657548947!3d-8.666918190291227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240e85637f413%3A0x59410e9a1a737893!2sJl.%20Thamrin%20No.31%2C%20Pemecutan%2C%20Kec.%20Denpasar%20Bar.%2C%20Kota%20Denpasar%2C%20Bali%2080119!5e0!3m2!1sen!2sid!4v1694434925026!5m2!1sen!2sid" 
                      width="100%" 
                      height="300" 
                      class="map-frame" 
                      allowfullscreen="" 
                      loading="lazy" 
                      referrerpolicy="no-referrer-when-downgrade">
                  </iframe>
              </div>
               
              <!-- Bagian alamat -->
              <div class="col-md-6 ">   
                  <p>Jl. Thamrin No.31, Pemecutan, Kec. Denpasar Bar., Kota Denpasar, Bali 80119</p>
              </div>
          </div>
      
  </section>

  <div class="line"></div>
    <section id="facility" class="facility mt-4">
      <div class="riviews mt-4 ">
        <h2 class="text-large ">
            <img src="{{asset('frontendreis/assets/img/f.png')}}" width="50" height="50" class="img-fluid" alt="Responsive image">
            Facility
        </h2>

  <!-- Bagian Daftar Fasilitas -->
      <div class="row ml-5">
        <!-- Kolom 1 -->
        <div class="col-md-4">
            <ul class="facility-list">
                <li><i class="fas fa-wifi"></i> Wifi</li>
                <li><i class="fas fa-swimming-pool"></i> Swimming Pool</li>
                <li><i class="fas fa-snowflake"></i> AC</li>
            </ul>
        </div>

        <!-- Kolom 2 -->
        <div class="col-md-4">
            <ul class="facility-list">
                <li><i class="fas fa-dumbbell"></i> Gym</li>
                <li><i class="fas fa-concierge-bell"></i> Receptionist 24 Hours</li>
                <li><i class="fas fa-elevator"></i> Lift</li>
            </ul>
        </div>

        <!-- Kolom 3 -->
        <div class="col-md-4">
            <ul class="facility-list">
                <li><i class="fas fa-parking"></i> Parking Area</li>
                <li><i class="fas fa-utensils"></i> Restaurant & Cafe</li>
                <li><i class="fas fa-child"></i> Kids Facility</li>
            </ul>
        </div>
  </section>

  <div class="line"></div>


  <section id="about" class="about mt-4">
    <div class="riviews mt-4 ">
      <h2 class="text-large ">
          <img src="{{asset('frontendreis/assets/img/a.png')}}" width="50" height="50" class="img-fluid" alt="Responsive image">
          About
      </h2>
     
      <div class="container ml-5">
        @if ($hotel)
        <p class="text-justify">{{ $hotel->description}}</p>
            @endif 

      </div>
   </div>
  </section>

  <div class="line"></div>

  <section id="policy" class="policy mt-4">
    <div class="riviews mt-4 ">
      <h2 class="text-large ">
          <img src="{{asset('frontendreis/assets/img/a.png')}}" width="50" height="50" class="img-fluid" alt="Responsive image">
          Policy
      </h2>
      <div class="container ml-5"> 
        <p class="font-weight-bold">Check in procedure</p>
        <div class="d-flex justify-content-start">
            <p>Check in</p> 
            <span class="ml-5">14:00-23:59</span>
        </div>
        <div class="d-flex justify-content-start">
            <p>Check out</p> 
            <span class=" ml-5">12:00</span>
        </div>
    </div>
    
    </div>

    </div>
  </section>
      
  </div>
  
 </div>
 </div>
    
  
    <!-- end content -->

