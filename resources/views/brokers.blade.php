@extends('layouts.app')

@section('content')
<!-- Hero -->
<section class="hero center" style="background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c') center/cover no-repeat; height: auto;">
  <div>
    <h1>Find Your Ideal Broker</h1>
    <p>Connect with experienced property brokers across Pakistan.</p>
    <select id="cityFilter" class="form-select d-inline-block w-auto">
        <option value="">All Cities</option>
        <option value="Karachi">Karachi</option>
        <option value="Lahore">Lahore</option>
        <option value="Islamabad">Islamabad</option>
        <option value="Rawalpindi">Rawalpindi</option>
        <option value="Faisalabad">Faisalabad</option>
    </select>
    <select id="specializationFilter" class="form-select d-inline-block w-auto ms-2">
        <option value="">All Specializations</option>
        <option value="Residential">Residential</option>
        <option value="Commercial">Commercial</option>
        <option value="Industrial">Industrial</option>
        <option value="Luxury">Luxury Properties</option>
    </select>
  </div>
</section>

<!-- Brokers Listings -->
<section id="brokers" class="container">
  <h2 class="title">Our Certified Brokers</h2>
  
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if($brokers->count() > 0)
    <div class="grid">
        @foreach($brokers as $broker)
        <div class="card5 broker-card" 
             data-city="{{ $broker->city }}"
             data-specialization="{{ $broker->specialization }}">
          <div class="broker-image">
            <img src="{{ $broker->image_url ?: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60' }}" 
                 alt="{{ $broker->name }}">
          </div>
          <div class="broker-info p-3">
            <h3>{{ $broker->name }}</h3>
            <p class="text-muted mb-1">
              <i class="fas fa-map-marker-alt"></i> {{ $broker->city }}
            </p>
            <p class="mb-1">
              <strong>Specialization:</strong> {{ $broker->specialization }}
            </p>
            <p class="mb-1">
              <strong>Experience:</strong> {{ $broker->experience_years }} years
            </p>
            <p class="mb-2">
              <strong>Contact:</strong> {{ $broker->phone }}
            </p>
            @if($broker->description)
            <p class="small">{{ Str::limit($broker->description, 100) }}</p>
            @endif
            <div class="d-flex gap-2 mt-2">
              <a href="mailto:{{ $broker->email }}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-envelope"></i> Email
              </a>
              <a href="tel:{{ $broker->phone }}" class="btn btn-sm btn-outline-success">
                <i class="fas fa-phone"></i> Call
              </a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  @else
    <div class="text-center py-5">
        <h4>No brokers available at the moment.</h4>
        <p class="text-muted">Check back soon for new broker listings!</p>
    </div>
  @endif
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cityFilter = document.getElementById('cityFilter');
    const specializationFilter = document.getElementById('specializationFilter');
    const brokerCards = document.querySelectorAll('.broker-card');

    function filterBrokers() {
        const selectedCity = cityFilter.value;
        const selectedSpecialization = specializationFilter.value;

        brokerCards.forEach(card => {
            const city = card.getAttribute('data-city');
            const specialization = card.getAttribute('data-specialization');

            const matchesCity = !selectedCity || city === selectedCity;
            const matchesSpecialization = !selectedSpecialization || specialization === selectedSpecialization;

            if (matchesCity && matchesSpecialization) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    cityFilter.addEventListener('change', filterBrokers);
    specializationFilter.addEventListener('change', filterBrokers);
});
</script>

<style>
.broker-card {
    transition: transform 0.3s ease;
}
.broker-card:hover {
    transform: translateY(-5px);
}
.broker-image {
    height: 200px;
    overflow: hidden;
}
.broker-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.broker-info {
    height: calc(100% - 200px);
    display: flex;
    flex-direction: column;
}
.form-select {
    padding: 8px 16px;
    border-radius: 4px;
    border: 1px solid #ddd;
    background-color: white;
}
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}
</style>
@endsection