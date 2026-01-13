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
    <span>Property added to cart!</span>
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
              data-details="@if($property->bedrooms && $property->bathrooms){{ $property->bedrooms }} Bed | {{ $property->bathrooms }} Bath | @elseif($property->size){{ $property->size }} sqft | @endif{{ $property->location }}"
              data-price="Rs {{ number_format($property->price) }}/{{ $property->price_type }}"
              data-img="{{ $property->image_url }}">
              Book Appointment
            </button>
            
            <button class="btn cart-btn add-to-cart-btn"
              data-id="{{ $property->id }}"
              data-title="{{ $property->title }}"
              data-details="@if($property->bedrooms && $property->bathrooms){{ $property->bedrooms }} Bed | {{ $property->bathrooms }} Bath | @elseif($property->size){{ $property->size }} sqft | @endif{{ $property->location }}"
              data-price="Rs {{ number_format($property->price) }}/{{ $property->price_type }}"
              data-img="{{ $property->image_url }}"
              data-price-value="{{ $property->price }}"
              data-price-type="{{ $property->price_type }}"
              data-bedrooms="{{ $property->bedrooms ?? '' }}"
              data-bathrooms="{{ $property->bathrooms ?? '' }}"
              data-size="{{ $property->size ?? '' }}"
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
// ============================================
// MAIN INITIALIZATION
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Page loaded - Initializing all functionality...');
    
    // Initialize all features
    initializeBookAppointment();
    initializeCartFunctionality();
    initializeSearch();
    initializeFilters();
    
    console.log('✅ All features initialized successfully');
});

// ============================================
// BOOK APPOINTMENT FUNCTIONALITY
// ============================================
function initializeBookAppointment() {
    console.log('📅 Initializing Book Appointment buttons...');
    
    document.querySelectorAll('.book-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const property = {
                title: this.dataset.title,
                details: this.dataset.details,
                price: this.dataset.price,
                img: this.dataset.img
            };
            
            console.log('📅 Booking property:', property);
            
            try {
                localStorage.setItem('selectedProperty', JSON.stringify(property));
                console.log('✅ Property saved for booking');
                window.location.href = '/appointment';
            } catch (error) {
                console.error('❌ Error saving booking:', error);
                alert('Error booking property. Please try again.');
            }
        });
    });
    
    console.log(`✅ ${document.querySelectorAll('.book-btn').length} Book Appointment buttons initialized`);
}

// ============================================
// ADD TO CART FUNCTIONALITY (FIXED)
// ============================================
function initializeCartFunctionality() {
    console.log('🛒 Initializing Cart functionality...');
    
    // Initialize cart buttons state on page load
    initializeCartButtons();
    
    // Add event listeners to all Add to Cart buttons
    const cartButtons = document.querySelectorAll('.add-to-cart-btn');
    console.log(`🛒 Found ${cartButtons.length} cart buttons`);
    
    cartButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('🛒 Cart button clicked for property ID:', this.dataset.id);
            addToCart(this);
        });
    });
}

function addToCart(button) {
    console.log('🛒 addToCart function called');
    
    // Collect property data from button attributes
    const property = {
        id: button.dataset.id,
        title: button.dataset.title,
        details: button.dataset.details,
        price: button.dataset.price,
        img: button.dataset.img,
        priceValue: button.dataset.priceValue,
        priceType: button.dataset.priceType,
        bedrooms: button.dataset.bedrooms,
        bathrooms: button.dataset.bathrooms,
        size: button.dataset.size,
        location: button.dataset.location,
        addedAt: new Date().toISOString()
    };
    
    console.log('🛒 Property data:', property);
    
    // Get existing cart or initialize empty array
    let cart = [];
    try {
        const cartData = localStorage.getItem('propertyCart');
        cart = cartData ? JSON.parse(cartData) : [];
        console.log('🛒 Existing cart:', cart);
    } catch (error) {
        console.error('❌ Error reading cart:', error);
        cart = [];
    }
    
    // Check if property already exists in cart
    const existingIndex = cart.findIndex(item => item.id === property.id);
    
    if (existingIndex === -1) {
        // Add new property to cart
        cart.push(property);
        
        // Save to localStorage
        try {
            localStorage.setItem('propertyCart', JSON.stringify(cart));
            console.log('✅ Cart saved to localStorage:', cart);
        } catch (error) {
            console.error('❌ Error saving cart:', error);
            alert('Error saving to cart. Please try again.');
            return;
        }
        
        // Update button appearance
        updateButtonState(button, true);
        
        // Show success notification
        showCartNotification('Property added to cart! Redirecting...');
        
        // Redirect to appointment page after 2 seconds
        console.log('🔄 Redirecting to appointment page in 2 seconds...');
        setTimeout(() => {
            console.log('🔄 Redirecting now...');
            window.location.href = '/appointment';
        }, 2000);
        
    } else {
        // Property already in cart
        console.log('⚠️ Property already in cart');
        showCartNotification('This property is already in your cart!');
        
        // Still redirect to appointment page
        setTimeout(() => {
            window.location.href = '/appointment';
        }, 1500);
    }
}

// Update button state (added/not added)
function updateButtonState(button, isAdded) {
    if (isAdded) {
        button.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6L9 17l-5-5"></path>
            </svg>
            Added to Cart
        `;
        button.classList.add('added');
        button.disabled = true;
    } else {
        button.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            Add to Cart
        `;
        button.classList.remove('added');
        button.disabled = false;
    }
}

// Show cart notification
function showCartNotification(message) {
    const notification = document.getElementById('cartNotification');
    
    if (!notification) {
        console.error('❌ Cart notification element not found');
        return;
    }
    
    // Update message
    notification.querySelector('span').textContent = message;
    
    // Show notification
    notification.style.display = 'block';
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    // Hide after 2 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.style.display = 'none';
        }, 300);
    }, 2000);
}

// Initialize cart buttons based on localStorage
function initializeCartButtons() {
    console.log('🔄 Initializing cart button states...');
    
    let cart = [];
    try {
        const cartData = localStorage.getItem('propertyCart');
        cart = cartData ? JSON.parse(cartData) : [];
        console.log('🛒 Cart loaded:', cart.length, 'items');
    } catch (error) {
        console.error('❌ Error loading cart:', error);
        cart = [];
    }
    
    // Update all buttons based on cart contents
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        const propertyId = btn.dataset.id;
        const isInCart = cart.some(item => item.id === propertyId);
        
        if (isInCart) {
            updateButtonState(btn, true);
        }
    });
}

// ============================================
// AJAX SEARCH FUNCTIONALITY
// ============================================
function initializeSearch() {
    console.log('🔍 Initializing Search functionality...');
    
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
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'block';
            });
            return;
        }

        console.log('🔍 Searching for:', searchTerm);

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
            console.log('✅ Search results:', data.properties.length, 'properties found');
            displayResults(data.properties, searchTerm);
        })
        .catch(error => {
            console.error('❌ Search error:', error);
            searchResults.innerHTML = '<div class="search-result-item no-results">Error loading results</div>';
            searchResults.style.display = 'block';
        });
    }

    // Display search results
    function displayResults(properties, searchTerm) {
        if (properties.length === 0) {
            searchResults.innerHTML = '<div class="search-result-item no-results">No properties found</div>';
            searchResults.style.display = 'block';
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'none';
            });
            return;
        }

        let resultsHTML = '';
        const propertyIds = [];
        
        properties.forEach(property => {
            propertyIds.push(property.id.toString());
            
            let locationText = '';
            if (property.bedrooms && property.bathrooms) {
                locationText = `${property.bedrooms} Bed | ${property.bathrooms} Bath | ${property.location}`;
            } else if (property.size) {
                locationText = `${property.size} sqft | ${property.location}`;
            } else {
                locationText = property.location;
            }

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

        document.querySelectorAll('.property-card').forEach(card => {
            const cardId = card.getAttribute('data-id');
            card.style.display = propertyIds.includes(cardId) ? 'block' : 'none';
        });

        document.querySelectorAll('.search-result-item').forEach(item => {
            item.addEventListener('click', function() {
                const propertyId = this.getAttribute('data-property-id');
                highlightProperty(propertyId);
                searchInput.value = '';
                searchResults.style.display = 'none';
            });
        });
    }

    function highlightProperty(propertyId) {
        document.querySelectorAll('.property-card').forEach(card => {
            card.classList.remove('highlighted-property');
        });

        const propertyElement = document.getElementById(`property-${propertyId}`);
        if (propertyElement) {
            propertyElement.classList.add('highlighted-property');
            propertyElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            setTimeout(() => {
                propertyElement.classList.remove('highlighted-property');
            }, 3000);
        }
    }

    function highlightText(text, searchTerm) {
        if (!searchTerm || !text) return text;
        const regex = new RegExp(`(${searchTerm.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
        return text.replace(regex, '<span class="highlight">$1</span>');
    }

    searchInput.addEventListener('input', debounce(performSearch, 300));

    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = 'none';
        }
    });

    searchInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'block';
            });
        }
    });

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            searchResults.style.display = 'none';
            searchInput.value = '';
            document.querySelectorAll('.property-card').forEach(card => {
                card.style.display = 'block';
            });
        }
    });
    
    console.log('✅ Search functionality initialized');
}

// ============================================
// FILTER FUNCTIONALITY
// ============================================
function initializeFilters() {
    console.log('🔧 Initializing Filters...');
    
    const priceTypeFilter = document.getElementById('priceTypeFilter');
    const cityFilter = document.getElementById('cityFilter');

    function filterProperties() {
        const selectedPriceType = priceTypeFilter.value;
        const selectedCity = cityFilter.value;
        
        console.log('🔧 Filtering - Price Type:', selectedPriceType || 'All', '| City:', selectedCity || 'All');

        document.querySelectorAll('.property-card').forEach(card => {
            const priceType = card.getAttribute('data-price-type');
            const city = card.getAttribute('data-city');

            const matchesPriceType = !selectedPriceType || priceType === selectedPriceType;
            const matchesCity = !selectedCity || city === selectedCity;

            card.style.display = (matchesPriceType && matchesCity) ? 'block' : 'none';
        });
    }

    priceTypeFilter.addEventListener('change', filterProperties);
    cityFilter.addEventListener('change', filterProperties);
    
    console.log('✅ Filters initialized');
}

// Optional: Clear cart function (for testing in console)
function clearCart() {
    localStorage.removeItem('propertyCart');
    console.log('🧹 Cart cleared');
    location.reload();
}
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
/* Cart Notification - Fixed */
.cart-notification {
    position: fixed;
    top: 20px;
    right: -400px; /* Start off-screen */
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    z-index: 9999;
    display: none;
    transition: right 0.3s ease-in-out;
    min-width: 300px;
}

.cart-notification.show {
    display: block;
    right: 20px; /* Slide in from right */
}

.cart-notification span {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
}

.cart-notification span::before {
    content: '✓';
    font-weight: bold;
    font-size: 20px;
    background: rgba(255, 255, 255, 0.3);
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
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