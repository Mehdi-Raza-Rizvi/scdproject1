
@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero">
  <div class="container center">
    <div>
      <h1>Find Your Dream Property</h1>
      <p>We have the best properties for sale and rent across Pakistan.</p>
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
<!-- Featured Listings added  -->
<section class="container">
  <h2  class="title">Featured Listings</h2>
  <div class="grid">

    <!-- Each Property Card -->
    <div class="card5">
      <img src="https://www.nation.com.pk/digital_images/large/2016-02-18/4-reasons-why-apartment-living-is-popular-in-karachi-1455810590-9378.jpg" alt="Apartment in Karachi">
      <h3>Luxury Apartment</h3>
      <p>2 Bed | 2 Bath | DHA Phase 8</p>
      <p>📍 Karachi</p>
      <p><strong>Rs 10,000,000/-</strong></p>
      <button class="btn book-btn"
        data-title="Creek Vistas Apartment - Karachi"
        data-details="Spacious 2-bedroom apartment located in the heart of DHA Phase 8. Features a fully equipped kitchen, balcony view, 24/7 security, and dedicated parking. Ideal for small families or professionals."
        data-price="Rs 10,000,000/-"
        data-img="https://www.nation.com.pk/digital_images/large/2016-02-18/4-reasons-why-apartment-living-is-popular-in-karachi-1455810590-9378.jpg">
        View Description
      </button>
    </div>

    <div class="card5">
      <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4" alt="House in Lahore">
      <h3>Family House</h3>
      <p>3 Bed | 3 Bath | Model Town</p>
      <p>📍 Lahore</p>
      <p><strong>Rs 15,000,000/-</strong></p>
      <button class="btn book-btn"
        data-title="Bahria Town House - Lahore"
        data-details="A beautiful 5-marla double-story home in Bahria Town. Comes with 3 bedrooms, 3 bathrooms, a modern kitchen, and a cozy living room. Walking distance to schools and supermarkets."
        data-price="Rs 15,000,000/-"
        data-img="https://images.unsplash.com/photo-1560185127-6ed189bf02f4">
        View Description
      </button>
    </div>

    <div class="card5">
      <img src="https://smartbenefits.pk/wp-content/uploads/2024/01/KickStart-Co-Working-Space-in-Islamabad-1024x768-1.jpg" alt="Office in Islamabad">
      <h3>Office Space</h3>
      <p>1200 sqft | Blue Area</p>
      <p>📍 Islamabad</p>
      <p><strong>Rs 8,500,000/-</strong></p>
      <button class="btn book-btn"
        data-title="Office Space - Islamabad"
        data-details="Compact yet stylish office in Islamabad. Furnished with a kitchenette, wardrobe, and attached bath. Perfect for singles or working professionals."
        data-price="Rs 8,500,000/-"
        data-img="https://smartbenefits.pk/wp-content/uploads/2024/01/KickStart-Co-Working-Space-in-Islamabad-1024x768-1.jpg">
        View Description
      </button>
    </div>

    <div class="card5">
      <img src="https://pakflagproperties.com/wp-content/uploads/2022/03/arby-towers-bahria-town-karachi.jpg" alt="Apartment in Karachi">
      <h3>Modern Apartment</h3>
      <p>1 Bed | 1 Bath | Clifton Block 8</p>
      <p>📍 Karachi</p>
      <p><strong>Rs 12,000,000/-</strong></p>
      <button class="btn book-btn"
        data-title="Modern Apartment - Karachi"
        data-details="A 500-square-yard luxury villa featuring 5 bedrooms, marble flooring, lush garden, and spacious car porch. Prime location near Clifton Beach."
        data-price="Rs 12,000,000/-"
        data-img="https://pakflagproperties.com/wp-content/uploads/2022/03/arby-towers-bahria-town-karachi.jpg">
        View Description
      </button>
    </div>

    <div class="card5">
      <img src="https://media.zameen.com/thumbnails/218488382-800x600.jpeg" alt="Villa in Lahore">
      <h3>Luxury Villa</h3>
      <p>5 Bed | 6 Bath | Gulberg</p>
      <p>📍 Lahore</p>
      <p><strong>Rs 25,000,000/-</strong></p>
      <button class="btn book-btn"
        data-title="Luxury Villa - Lahore"
        data-details="Peaceful 3-bedroom cottage facing the sea. Comes fully furnished with modern amenities, large deck, and private parking. Ideal for vacation rentals."
        data-price="Rs 25,000,000/-"
        data-img="https://media.zameen.com/thumbnails/218488382-800x600.jpeg">
        View Description
      </button>
    </div>

    <div class="card5">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbSJL3XBTP9kTwTMeSW74lKJWliN2YTdIPSQ&s" alt="Office in Islamabad">
      <h3>Corporate Office</h3>
      <p>1800 sqft | G-11 Markaz</p>
      <p>📍 Islamabad</p>
      <p><strong>Rs 20,000,000/-</strong></p>
      <button class="btn book-btn"
        data-title="Corporate Office - Islamabad"
        data-details="Brand-new office space available in Islamabad. Includes central AC, conference room, pantry, and backup generator. Perfect for startups and small businesses."
        data-price="Rs 20,000,000/-"
        data-img="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbSJL3XBTP9kTwTMeSW74lKJWliN2YTdIPSQ&s">
        View Description
      </button>
    </div>

  </div>
</section>

<section class="container">
  <h2 class="title">🏠 Featured Rentals</h2>

  <div class="grid">
    <!-- 1. Modern Apartment -->
    <div class="card5">
      <img src="https://images.unsplash.com/photo-1501183638710-841dd1904471" alt="Apartment in Karachi">
      <h3>Modern Apartment</h3>
      <p>2 Bed | 2 Bath | DHA Phase 6</p>
      <p>📍 Karachi</p>
      <p><strong>Rs 120,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Modern Apartment - Karachi"
        data-details="Spacious 2-bedroom apartment located in the heart of DHA Phase 6. Features a fully equipped kitchen, balcony view, 24/7 security, and dedicated parking. Ideal for small families or professionals."
        data-price="Rs 120,000/month"
        data-img="https://images.unsplash.com/photo-1501183638710-841dd1904471">
        View Description
      </button>
    </div>

    <!-- 2. Family House -->
    <div class="card5">
      <img src="https://www.maramani.com/cdn/shop/files/Two-story4bedroomhouse-ID2441101.jpg?v=1715872374&width=800" alt="Family House Lahore">
      <h3>Family House</h3>
      <p>3 Bed | 3 Bath | Model Town</p>
      <p>📍 Lahore</p>
      <p><strong>Rs 150,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Family House - Lahore"
        data-details="Peaceful 3-bedroom cottage facing the sea. Comes fully furnished with modern amenities, large deck, and private parking. Ideal for vacation rentals. Perfect for families, with garden and parking space."
        data-price="Rs 150,000/month"
        data-img="https://images.unsplash.com/photo-1572120360610-d971b9b78825">
        View Description
      </button>
    </div>

    <!-- 3. Office Space -->
    <div class="card5">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQop8ty68eCeRBklStiFBkRoW38sx1eOd1eig&s" alt="Office in Islamabad">
      <h3>Office Space</h3>
      <p>1500 sqft | Blue Area</p>
      <p>📍 Islamabad</p>
      <p><strong>Rs 250,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Office Space - Islamabad"
        data-details="Corporate office space with conference room and reception."
        data-price="Rs 250,000/month"
        data-img="https://images.unsplash.com/photo-1590642910939-0b5d6d4d3d9e">
        View Description
      </button>
    </div>

    <!-- 4. Luxury Villa -->
    <div class="card5">
      <img src="https://thumbs.dreamstime.com/b/modern-house-interior-exterior-design-46517595.jpg" alt="Luxury Villa Lahore">
      <h3>Luxury Villa</h3>
      <p>5 Bed | 6 Bath | Gulberg</p>
      <p>📍 Lahore</p>
      <p><strong>Rs 350,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Luxury Villa - Lahore"
        data-details="Fully furnished villa with swimming pool and terrace."
        data-price="Rs 350,000/month"
        data-img="https://images.unsplash.com/photo-1617099212847-51c8b84ba72a">
        View Description
      </button>
    </div>

    <!-- 5. Studio Apartment -->
    <div class="card5">
      <img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511" alt="Studio Apartment Karachi">
      <h3>Studio Apartment</h3>
      <p>1 Bed | 1 Bath | Clifton</p>
      <p>📍 Karachi</p>
      <p><strong>Rs 65,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Studio Apartment - Karachi"
        data-details="Compact modern studio with sea-facing balcony."
        data-price="Rs 65,000/month"
        data-img="https://images.unsplash.com/photo-1505691938895-1758d7feb511">
        View Description
      </button>
    </div>

    <!-- 6. Shared Workspace -->
    <div class="card5">
      <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Shared Workspace Islamabad">
      <h3>Shared Workspace</h3>
      <p>Open Plan | 10 Desks | G-10</p>
      <p>📍 Islamabad</p>
      <p><strong>Rs 80,000/month</strong></p>
      <button class="btn book-btn"
        data-title="Shared Workspace - Islamabad"
        data-details="Bright coworking office for small teams."
        data-price="Rs 80,000/month"
        data-img="https://images.unsplash.com/photo-1521737604893-d14cc237f11d">
        View Description
      </button>
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
      <span>- Ahmed R.</span>
    </div>
    <div class="card">
      <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Fatima S">
      <p>"Best property listings in Pakistan. Highly recommended!"</p>
      <div class="rating">⭐⭐⭐⭐⭐</div>
      <span>- Fatima S.</span>
    </div>
    <div class="card">
      <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Bilal K">
      <p>"Professional team that made my property search so easy."</p>
      <div class="rating">⭐⭐⭐⭐⭐</div>
      <span>- Bilal K.</span>
    </div>
  </div>
</section>

<script>
document.querySelectorAll('.book-btn').forEach(btn => {
  btn.addEventListener('click', function () {
    const property = {
      title: this.getAttribute('data-title'),
      details: this.getAttribute('data-details'),
      price: this.getAttribute('data-price'),
      img: this.getAttribute('data-img'),
    };

    // Saves property data to localStorage
    localStorage.setItem('selectedProperty', JSON.stringify(property));

    // Redirect to product details page
    window.location.href = '/product';
  });
});
</script>

<script>  // Explore ka button featuerd listings per le aye
  document.getElementById('featured').addEventListener('click', function() {
    const featuredSection = document.getElementById('featured');
    if (featuredSection) {
      featuredSection.scrollIntoView({ behavior: 'smooth' });
    }
  });
</script>


@endsection


