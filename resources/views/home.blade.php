@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-container">
        <section>
            
        </section>
        <!-- <img src="{{ asset('images/banda.jpg') }}" alt="City view from office" class="hero-image">
        <div class="hero-overlay"></div> -->
        <div class="hero-content">
            <h1>Find Your Dream Property</h1>
            <p>We have the best properties for sale and rent.</p>
        </div>
    </div>
</section>

<!-- Filter Bar -->
<section class="filter-section">
    <div class="filter-container">
        <div class="filter-group">
            <label for="city-select-home">Location</label>
            <div class="select-wrapper">
                <i class="fas fa-map-location-dot"></i>
                <select id="city-select-home" name="city-select-home">
                    <option>All Cities</option>
                    <option>Islamabad</option>
                    <option>Karachi</option>
                    <option>Lahore</option>
                    <option>Rawalpindi</option>
                    <option>Peshawar</option>
                </select>
            </div>
        </div>
        <button class="search-button">
            <i class="fas fa-search"></i> Search
        </button>
    </div>
</section>

<!-- Featured Properties Section -->
<section class="featured-section">
    <h2>Featured Listings</h2>
    
    <div class="properties-grid">
        <!-- Property Card 1 -->
        <div class="property-card">
            <img src="https://placehold.co/600x400/60a5fa/ffffff?text=Modern+Family+House" alt="Property 1">
            <div class="property-details">
                <span class="property-type">For Sale</span>
                <h3 class="property-price">$750,000</h3>
                <p class="property-location">
                    <i class="fas fa-map-marker-alt"></i>123 Main St, Islamabad, Pakistan
                </p>
                <div class="property-features">
                    <span class="feature"><i class="fas fa-bed"></i><strong>4</strong> Beds</span>
                    <span class="feature"><i class="fas fa-bath"></i><strong>3</strong> Baths</span>
                    <span class="feature"><i class="fas fa-ruler-combined"></i><strong>2,400</strong> sqft</span>
                </div>
            </div>
        </div>

        <!-- Property Card 2 -->
        <div class="property-card">
            <img src="https://placehold.co/600x400/34d399/ffffff?text=Cozy+Suburban+Home" alt="Property 2">
            <div class="property-details">
                <span class="property-type">For Rent</span>
                <h3 class="property-price">$3,200 / mo</h3>
                <p class="property-location">
                    <i class="fas fa-map-marker-alt"></i>456 Oak Ave, Karachi, Pakistan
                </p>
                <div class="property-features">
                    <span class="feature"><i class="fas fa-bed"></i><strong>3</strong> Beds</span>
                    <span class="feature"><i class="fas fa-bath"></i><strong>2</strong> Baths</span>
                    <span class="feature"><i class="fas fa-ruler-combined"></i><strong>1,800</strong> sqft</span>
                </div>
            </div>
        </div>

        <!-- Property Card 3 -->
        <div class="property-card">
            <img src="https://placehold.co/600x400/f87171/ffffff?text=Luxury+Downtown+Condo" alt="Property 3">
            <div class="property-details">
                <span class="property-type">For Sale</span>
                <h3 class="property-price">$420,000</h3>
                <p class="property-location">
                    <i class="fas fa-map-marker-alt"></i>789 Pine St, Lahore, Pakistan
                </p>
                <div class="property-features">
                    <span class="feature"><i class="fas fa-bed"></i><strong>2</strong> Beds</span>
                    <span class="feature"><i class="fas fa-bath"></i><strong>2</strong> Baths</span>
                    <span class="feature"><i class="fas fa-ruler-combined"></i><strong>1,100</strong> sqft</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="reviews-section">
    <h2>Customer Reviews</h2>
    <div class="reviews-container">
        <div class="review-card">
            <p>"Amazing service! Found my dream home in Islamabad within a week."</p>
            <div class="rating">⭐⭐⭐⭐⭐</div>
            <span class="reviewer">- Ahmed R.</span>
        </div>
        <div class="review-card">
            <p>"Best property listings in Pakistan. Highly recommended!"</p>
            <div class="rating">⭐⭐⭐⭐⭐</div>
            <span class="reviewer">- Fatima S.</span>
        </div>
        <div class="review-card">
            <p>"Professional team that made my property search so easy."</p>
            <div class="rating">⭐⭐⭐⭐⭐</div>
            <span class="reviewer">- Bilal K.</span>
        </div>
    </div>
</section>

@endsection