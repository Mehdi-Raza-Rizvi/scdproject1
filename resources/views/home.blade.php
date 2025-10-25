@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero">
  <div class="container center">
    <div>
      <h1>Find Your Dream Property</h1>
      <p>We have the best properties for sale and rent across Pakistan.</p>
      <button class="btn">Explore Now</button>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="about container">
  <div class="row">
    <div class="col">
      <img src="https://img.lovepik.com/background/20211021/large/lovepik-atmospheric-business-building-background-image_401688816.jpg" alt="Real estate office">
    </div>
    <div class="col">
      <h2>About CM Real Estate</h2>
      <p>With 30+ years of excellence, CM Real Estate has been Pakistan’s most trusted name in property services, connecting clients to their dream homes and investments.</p>
    </div>
  </div>
</section>

<!-- Services -->
<section class="services container">
  <h2 class="title">Our Services</h2>
  <div class="grid">
    <div class="card">
      <h3>🏡 Property Sales</h3>
      <p>We help you buy or sell your property at the best market value.</p>
    </div>
    <div class="card">
      <h3>🔑 Rentals</h3>
      <p>Find premium rental properties that match your lifestyle and budget.</p>
    </div>
    <div class="card">
      <h3>🏢 Commercial Leasing</h3>
      <p>Grow your business with our curated commercial spaces in prime locations.</p>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="reviews container">
  <h2 class="title">What Our Clients Say</h2>
  <div class="grid">
    <div class="card">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ahmed R">
      <p>"Amazing service! Found my dream home in Islamabad within a week."</p>
      <div class="rating">⭐⭐⭐⭐⭐</div>
      <span>- Alex R.</span>
    </div>
    <div class="card">
      <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Fatima S">
      <p>"Best property listings in Pakistan. Highly recommended!"</p>
      <div class="rating">⭐⭐⭐⭐⭐</div>
      <span>- Natasha R.</span>
    </div>
    <div class="card">
      <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Bilal K">
      <p>"Professional team that made my property search so easy."</p>
      <div class="rating">⭐⭐⭐⭐⭐</div>
      <span>- Bilal K.</span>
    </div>
  </div>
</section>

@endsection