@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="hero center" style="background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c') center/cover no-repeat; height: auto;">
  <div>
    <h1>Find Your Ideal Rental</h1>
    <p>Discover premium apartments, houses, and offices for rent across Pakistan.</p>
    <a href="#rentals" class="btn">Browse Rentals</a>
    <br><br>
    
    <!-- Search Bar -->
    <div class="search-container" style="max-width: 500px; margin: 0 auto 15px;">
        <div class="search-wrapper position-relative">
            <input type="text" id="propertySearch" class="form-control search-input" 
                   placeholder="Search by property name or city..." 
                   style="padding: 12px 45px 12px 20px; font-size: 16px;">
            <div class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <!-- Search Results Dropdown -->
            <div id="searchResults" class="search-results-dropdown"></div>
        </div>
    </div>
    
    <div class="filter-controls">
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

  <!-- Cart Notification -->
  <div id="cartNotification" class="cart-notification">
    <span>Property added to cart! Redirecting...</span>
  </div>

  @if($properties->count() > 0)
    <div class="grid" id="propertiesGrid">
        @foreach($properties as $property)
        <div class="card5 property-card" 
             id="property-{{ $property->id }}"
             data-id="{{ $property->id }}"
             data-price-type="{{ $property->price_type }}"
             data-city="{{ $property->city }}"
             data-title="{{ strtolower($property->title) }}"
             data-location="{{ strtolower($property->location) }}">
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
          
          <!-- Action Buttons -->
          <div class="property-actions">
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
            
            <button class="btn cart-btn add-to-cart-btn"
              data-id="{{ $property->id }}"
              data-title="{{ $property->title }}"
              data-details="
                  @if($property->bedrooms && $property->bathrooms)
                      {{ $property->bedrooms }} Bed | {{ $property->bathrooms }} Bath | 
                  @elseif($property->size)
                      {{ $property->size }} sqft | 
                  @endif
                  {{ $property->location }}"
              data-price="Rs {{ number_format($property->price) }}/{{ $property->price_type }}"
              data-img="{{ $property->image_url }}"
              data-price-value="{{ $property->price }}"
              data-price-type="{{ $property->price_type }}"
              data-bedrooms="{{ $property->bedrooms }}"
              data-bathrooms="{{ $property->bathrooms }}"
              data-size="{{ $property->size }}"
              data-location="{{ $property->location }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
              </svg>
              Add to Cart
            </button>
          </div>
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
// Save selected property and redirect for Book Appointment
// AJAX Search Bar Implementation
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('propertySearch');
    const searchResults = document.getElementById('searchResults');
    let debounceTimer;

    // Debounce function
    function debounce(func, delay) {
        return function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(func, delay);
        };
    }

    // AJAX Search function
    function performSearch() {
        const searchTerm = searchInput.value.trim();
        
        if (searchTerm.length < 2) {
            searchResults.innerHTML = '';
            searchResults.style.display = 'none';
            // Show all properties when search is cleared
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'block';
            });
            return;
        }

        // Make AJAX request to backend
        fetch(`/properties/search?q=${encodeURIComponent(searchTerm)}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            displayResults(data.properties, searchTerm);
        })
        .catch(error => {
            console.error('Search error:', error);
            searchResults.innerHTML = '<div class="search-result-item no-results">Error loading results</div>';
            searchResults.style.display = 'block';
        });
    }

    // Display search results
    function displayResults(properties, searchTerm) {
        if (properties.length === 0) {
            searchResults.innerHTML = '<div class="search-result-item no-results">No properties found</div>';
            searchResults.style.display = 'block';
            // Hide all properties
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'none';
            });
            return;
        }

        let resultsHTML = '';
        const propertyIds = [];
        
        properties.forEach(property => {
            propertyIds.push(property.id.toString());
            
            // Build location text
            let locationText = '';
            if (property.bedrooms && property.bathrooms) {
                locationText = `${property.bedrooms} Bed | ${property.bathrooms} Bath | ${property.location}`;
            } else if (property.size) {
                locationText = `${property.size} sqft | ${property.location}`;
            } else {
                locationText = property.location;
            }

            // Highlight matching text
            const highlightedTitle = highlightText(property.title, searchTerm);
            const highlightedCity = highlightText(property.city, searchTerm);
            const highlightedLocation = highlightText(locationText, searchTerm);

            resultsHTML += `
                <div class="search-result-item" data-property-id="${property.id}">
                    <div class="result-image">
                        <img src="${property.image_url}" alt="${property.title}">
                    </div>
                    <div class="result-content">
                        <h4>${highlightedTitle}</h4>
                        <p>${highlightedLocation}</p>
                        <p class="result-city">${highlightedCity}</p>
                        <div class="result-price">Rs ${Number(property.price).toLocaleString()}/${property.price_type}</div>
                    </div>
                </div>
            `;
        });

        searchResults.innerHTML = resultsHTML;
        searchResults.style.display = 'block';

        // Show only matching properties in the grid
        document.querySelectorAll('.property-card').forEach(card => {
            const cardId = card.getAttribute('data-id');
            if (propertyIds.includes(cardId)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        // Add click handlers to search results
        document.querySelectorAll('.search-result-item').forEach(item => {
            item.addEventListener('click', function() {
                const propertyId = this.getAttribute('data-property-id');
                highlightProperty(propertyId);
                
                // Clear search and hide results
                searchInput.value = '';
                searchResults.style.display = 'none';
            });
        });
    }

    // Function to highlight a property
    function highlightProperty(propertyId) {
        // Remove previous highlights
        document.querySelectorAll('.property-card').forEach(card => {
            card.classList.remove('highlighted-property');
        });

        // Find and highlight the selected property
        const propertyElement = document.getElementById(`property-${propertyId}`);
        if (propertyElement) {
            propertyElement.classList.add('highlighted-property');
            
            // Scroll to property with smooth animation
            propertyElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });

            // Remove highlight after 3 seconds
            setTimeout(() => {
                propertyElement.classList.remove('highlighted-property');
            }, 3000);
        }
    }

    // Highlight matching text
    function highlightText(text, searchTerm) {
        if (!searchTerm || !text) return text;
        const regex = new RegExp(`(${searchTerm.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
        return text.replace(regex, '<span class="highlight">$1</span>');
    }

    // Event listener for search input with debounce
    searchInput.addEventListener('input', debounce(performSearch, 300));

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Show all properties when search is cleared
    searchInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'block';
            });
        }
    });

    // Keyboard navigation
    searchInput.addEventListener('keydown', function(event) {
        const results = document.querySelectorAll('.search-result-item:not(.no-results)');
        
        if (event.key === 'Escape') {
            searchResults.style.display = 'none';
            searchInput.value = '';
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'block';
            });
        }
    });
});

</script>

<style>
/* Property Actions */
.property-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.property-actions .btn {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 15px;
    font-size: 14px;
}

.book-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
}

.cart-btn {
    background: white;
    color: #333;
    border: 2px solid #ddd;
    transition: all 0.3s ease;
}

.cart-btn:hover {
    background: #f8f9fa;
    border-color: #667eea;
    color: #667eea;
}

.cart-btn.added {
    background: #10b981;
    color: white;
    border-color: #10b981;
}

.cart-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.cart-btn svg {
    width: 16px;
    height: 16px;
}

/* Cart Notification */
.cart-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    display: none;
    transform: translateX(100%);
    transition: transform 0.3s ease;
}

.cart-notification.show {
    transform: translateX(0);
}

.cart-notification span {
    display: flex;
    align-items: center;
    gap: 10px;
}

.cart-notification span::before {
    content: '✓';
    font-weight: bold;
    font-size: 18px;
}

/* Search Bar Styles */
.search-wrapper {
    position: relative;
}

.search-input {
    width: 100%;
    border: 2px solid #ddd;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.search-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
}

/* Search Results Dropdown */
.search-results-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    max-height: 400px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
    margin-top: 5px;
}

.search-result-item {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-result-item:hover {
    background-color: #f8f9fa;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item .result-image {
    width: 60px;
    height: 60px;
    border-radius: 6px;
    overflow: hidden;
    margin-right: 15px;
    flex-shrink: 0;
}

.search-result-item .result-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.search-result-item .result-content {
    flex: 1;
    min-width: 0;
}

.search-result-item .result-content h4 {
    margin: 0 0 5px 0;
    font-size: 16px;
    font-weight: 600;
    color: #333;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.search-result-item .result-content p {
    margin: 0 0 5px 0;
    font-size: 14px;
    color: #666;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.search-result-item .result-price {
    font-size: 14px;
    font-weight: 600;
    color: #667eea;
}

.search-result-item.no-results {
    padding: 20px;
    text-align: center;
    color: #666;
    cursor: default;
}

.search-result-item.no-results:hover {
    background-color: transparent;
}

.highlight {
    background-color: #fff3cd;
    padding: 2px 4px;
    border-radius: 3px;
    font-weight: 600;
}

/* Property Highlighting Styles */
.property-card {
    transition: all 0.5s ease;
}

.highlighted-property {
    animation: highlightPulse 3s ease-in-out;
    position: relative;
    z-index: 10;
}

@keyframes highlightPulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
        border-color: #667eea;
    }
    15% {
        transform: scale(1.02);
        box-shadow: 0 0 0 10px rgba(102, 126, 234, 0.4);
        border-color: #667eea;
    }
    30% {
        transform: scale(1.01);
        box-shadow: 0 0 0 15px rgba(102, 126, 234, 0.2);
        border-color: #667eea;
    }
    45% {
        transform: scale(1.02);
        box-shadow: 0 0 0 20px rgba(102, 126, 234, 0.1);
        border-color: #667eea;
    }
    60% {
        transform: scale(1.01);
        box-shadow: 0 0 0 25px rgba(102, 126, 234, 0);
        border-color: #667eea;
    }
    100% {
        transform: scale(1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-color: transparent;
    }
}

.filter-controls {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

/* Make sure property cards have some border for highlighting */
.card5 {
    border: 2px solid transparent;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Responsive styles */
@media (max-width: 768px) {
    .search-container {
        max-width: 100%;
    }
    
    .filter-controls {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-controls select {
        width: 100%;
        max-width: 250px;
        margin: 5px 0;
    }
    
    .search-result-item .result-image {
        width: 50px;
        height: 50px;
    }
    
    .property-actions {
        flex-direction: column;
    }
    
    .cart-notification {
        left: 20px;
        right: 20px;
        text-align: center;
    }
}
</style>
@endsection