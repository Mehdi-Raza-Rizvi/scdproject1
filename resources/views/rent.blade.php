@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="hero center" style="background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c') center/cover no-repeat; height: auto;">
  <div>
    <h1>Find Your Ideal Rental</h1>
    <p>Discover premium apartments, houses, and offices for rent across Pakistan.</p>
    <a href="#rentals" class="btn">Browse Rentals</a>
    <br><br>
    <select id="priceTypeFilter" class="form-select d-inline-block w-auto">
        <option value="">All Price Types</option>
        <option value="month">Per Month</option>
        <option value="week">Per Week</option>
        <option value="day">Per Day</option>
    </select>
    <select id="cityFilter" class="form-select d-inline-block w-auto ms-2">
        <option value="">All Cities</option>
        <option value="Karachi">Karachi</option>
        <option value="Lahore">Lahore</option>
        <option value="Islamabad">Islamabad</option>
    </select>
  </div>
</section>

<!-- Rental Listings -->
<section id="rentals" class="container">
  <h2 class="title">Available Rentals</h2>
  
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if($properties->count() > 0)
    <div class="grid">
        @foreach($properties as $property)
        <div class="card5 property-card" 
             data-price-type="{{ $property->price_type }}"
             data-city="{{ $property->city }}">
          <img src="{{ $property->image_url }}" alt="{{ $property->title }}">
          <h3>{{ $property->title }}</h3>
          <p>
            @if($property->bedrooms && $property->bathrooms)
                {{ $property->bedrooms }} Bed | {{ $property->bathrooms }} Bath | 
            @elseif($property->size)
                {{ $property->size }} sqft | 
            @endif
            {{ $property->location }}
          </p>
          <p><strong>Rs {{ number_format($property->price) }}/{{ $property->price_type }}</strong></p>
          <button class="btn book-btn"
            data-title="{{ $property->title }}"
            data-details="
                @if($property->bedrooms && $property->bathrooms)
                    {{ $property->bedrooms }} Bed | {{ $property->bathrooms }} Bath | 
                @elseif($property->size)
                    {{ $property->size }} sqft | 
                @endif
                {{ $property->location }}"
            data-price="Rs {{ number_format($property->price) }}/{{ $property->price_type }}"
            data-img="{{ $property->image_url }}">
            Book Appointment
          </button>
        </div>
        @endforeach
    </div>
  @else
    <div class="text-center py-5">
        <h4>No properties available at the moment.</h4>
        <p class="text-muted">Check back soon for new listings!</p>
    </div>
  @endif
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

// Filter properties
document.addEventListener('DOMContentLoaded', function() {
    const priceTypeFilter = document.getElementById('priceTypeFilter');
    const cityFilter = document.getElementById('cityFilter');
    const propertyCards = document.querySelectorAll('.property-card');

    function filterProperties() {
        const selectedPriceType = priceTypeFilter.value;
        const selectedCity = cityFilter.value;

        propertyCards.forEach(card => {
            const priceType = card.getAttribute('data-price-type');
            const city = card.getAttribute('data-city');

            const matchesPriceType = !selectedPriceType || priceType === selectedPriceType;
            const matchesCity = !selectedCity || city === selectedCity;

            if (matchesPriceType && matchesCity) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    priceTypeFilter.addEventListener('change', filterProperties);
    cityFilter.addEventListener('change', filterProperties);
});
</script>

<style>
.property-card {
    transition: transform 0.3s ease;
}
.property-card:hover {
    transform: translateY(-5px);
}
.form-select {
    padding: 8px 16px;
    border-radius: 4px;
    border: 1px solid #ddd;
    background-color: white;
}
</style>

@endsection