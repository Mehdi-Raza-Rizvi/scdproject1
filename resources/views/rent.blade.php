@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="hero center" style="background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c') center/cover no-repeat; height: 60vh;">
  <div>
    <h1>Find Your Ideal Rental</h1>
    <p>Discover premium apartments, houses, and offices for rent across Pakistan.</p>
    <button class="btn">Browse Rentals</button>
  </div>
</section>

<!-- Rental Listings -->
<section class="container">
  <h2 class="title">Available Rentals</h2>
  <div class="grid">

    <!-- Each Property Card -->
    <div class="card5">
      <img src="https://www.nation.com.pk/digital_images/large/2016-02-18/4-reasons-why-apartment-living-is-popular-in-karachi-1455810590-9378.jpg" alt="Apartment in Karachi">
      <h3>Luxury Apartment - Karachi</h3>
      <p>2 Bed | 2 Bath | DHA Phase 6</p>
      <p><strong>Rs 120,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Luxury Apartment - Karachi"
        data-details="2 Bed | 2 Bath | DHA Phase 6"
        data-price="Rs 120,000/month"
        data-img="https://www.nation.com.pk/digital_images/large/2016-02-18/4-reasons-why-apartment-living-is-popular-in-karachi-1455810590-9378.jpg">
        Book Appointment
      </button>
    </div>

    <div class="card5">
      <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4" alt="House in Lahore">
      <h3>Family House - Lahore</h3>
      <p>3 Bed | 3 Bath | Model Town</p>
      <p><strong>Rs 180,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Family House - Lahore"
        data-details="3 Bed | 3 Bath | Model Town"
        data-price="Rs 180,000/month"
        data-img="https://images.unsplash.com/photo-1560185127-6ed189bf02f4">
        Book Appointment
      </button>
    </div>

    <div class="card5">
      <img src="https://smartbenefits.pk/wp-content/uploads/2024/01/KickStart-Co-Working-Space-in-Islamabad-1024x768-1.jpg" alt="Office in Islamabad">
      <h3>Office Space - Islamabad</h3>
      <p>1200 sqft | Blue Area</p>
      <p><strong>Rs 250,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Office Space - Islamabad"
        data-details="1200 sqft | Blue Area"
        data-price="Rs 250,000/month"
        data-img="https://smartbenefits.pk/wp-content/uploads/2024/01/KickStart-Co-Working-Space-in-Islamabad-1024x768-1.jpg">
        Book Appointment
      </button>
    </div>

    <div class="card5">
      <img src="https://pakflagproperties.com/wp-content/uploads/2022/03/arby-towers-bahria-town-karachi.jpg" alt="Apartment in Karachi">
      <h3>Modern Apartment - Karachi</h3>
      <p>1 Bed | 1 Bath | Clifton Block 8</p>
      <p><strong>Rs 85,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Modern Apartment - Karachi"
        data-details="1 Bed | 1 Bath | Clifton Block 8"
        data-price="Rs 85,000/month"
        data-img="https://pakflagproperties.com/wp-content/uploads/2022/03/arby-towers-bahria-town-karachi.jpg">
        Book Appointment
      </button>
    </div>

    <div class="card5">
      <img src="https://media.zameen.com/thumbnails/218488382-800x600.jpeg" alt="Villa in Lahore">
      <h3>Luxury Villa - Lahore</h3>
      <p>5 Bed | 6 Bath | Gulberg</p>
      <p><strong>Rs 350,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Luxury Villa - Lahore"
        data-details="5 Bed | 6 Bath | Gulberg"
        data-price="Rs 350,000/month"
        data-img="https://media.zameen.com/thumbnails/218488382-800x600.jpeg">
        Book Appointment
      </button>
    </div>

    <div class="card5">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbSJL3XBTP9kTwTMeSW74lKJWliN2YTdIPSQ&s" alt="Office in Islamabad">
      <h3>Corporate Office - Islamabad</h3>
      <p>1800 sqft | G-11 Markaz</p>
      <p><strong>Rs 280,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Corporate Office - Islamabad"
        data-details="1800 sqft | G-11 Markaz"
        data-price="Rs 280,000/month"
        data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbSJL3XBTP9kTwTMeSW74lKJWliN2YTdIPSQ&s">
        Book Appointment
      </button>
    </div>

    <!-- You can add more cards here as needed -->

  </div>
</section>

<script>
// Save selected property and redirect
document.querySelectorAll('.book-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const property = {
      title: btn.dataset.title,
      details: btn.dataset.details,
      price: btn.dataset.price,
      img: btn.dataset.img
    };
    localStorage.setItem('selectedProperty', JSON.stringify(property));
    window.location.href = '/appointment';
  });
});
</script>

@endsection
