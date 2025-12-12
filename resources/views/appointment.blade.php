@extends('layouts.app')

@section('content')
<section class="appointment-section">
  <div class="container">
    <h2 class="section-title">🛒 Your Cart</h2>
    <p class="section-subtitle">View and manage your selected properties below.</p>

    <!-- Cart Summary -->
    <div class="cart-summary mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cart Summary</h5>
          <div id="cart-stats"></div>
          <button id="clear-cart-btn" class="btn btn-danger btn-sm mt-2">Clear Cart</button>
        </div>
      </div>
    </div>

    <div id="cart-container" class="cart-container">
      <!-- Cart items will be loaded here -->
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const cartContainer = document.getElementById('cart-container');
  const cartStats = document.getElementById('cart-stats');
  const clearCartBtn = document.getElementById('clear-cart-btn');
  
  function loadCart() {
    const cart = JSON.parse(localStorage.getItem('propertyCart')) || [];
    
    if (cart.length === 0) {
      cartContainer.innerHTML = `
        <div class="empty-cart">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
          </svg>
          <h3>Your cart is empty</h3>
          <p>No properties have been added to your cart yet.</p>
          <a href="/" class="btn btn-primary">Browse Properties</a>
        </div>
      `;
      cartStats.innerHTML = '<p>0 items in cart</p>';
      return;
    }
    
    // Calculate total value
    const totalValue = cart.reduce((sum, item) => {
      return sum + (parseFloat(item.priceValue) || 0);
    }, 0);
    
    // Update stats
    cartStats.innerHTML = `
      <p><strong>${cart.length}</strong> item${cart.length !== 1 ? 's' : ''} in cart</p>
      <p>Total value: <strong>Rs ${totalValue.toLocaleString()}</strong></p>
    `;
    
    // Display cart items
    let cartHTML = '<div class="row">';
    
    cart.forEach((item, index) => {
      cartHTML += `
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="cart-item-card">
            <img src="${item.img}" alt="${item.title}" class="cart-item-img">
            <div class="cart-item-content">
              <h4>${item.title}</h4>
              <p class="cart-item-details">${item.details}</p>
              <p class="cart-item-price"><strong>${item.price}</strong></p>
              <div class="cart-item-actions">
                <button class="btn btn-sm btn-primary book-now-btn" data-index="${index}">
                  Book Now
                </button>
                <button class="btn btn-sm btn-outline-danger remove-item-btn" data-index="${index}">
                  Remove
                </button>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    
    cartHTML += '</div>';
    cartContainer.innerHTML = cartHTML;
    
    // Add event listeners
    document.querySelectorAll('.remove-item-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const index = parseInt(this.dataset.index);
        removeFromCart(index);
      });
    });
    
    document.querySelectorAll('.book-now-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const index = parseInt(this.dataset.index);
        bookSingleProperty(index);
      });
    });
  }
  
  function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem('propertyCart')) || [];
    
    if (index >= 0 && index < cart.length) {
      const removedItem = cart[index];
      cart.splice(index, 1);
      localStorage.setItem('propertyCart', JSON.stringify(cart));
      
      // Show removed notification
      alert(`Removed: ${removedItem.title}`);
      loadCart();
    }
  }
  
  function bookSingleProperty(index) {
    let cart = JSON.parse(localStorage.getItem('propertyCart')) || [];
    
    if (index >= 0 && index < cart.length) {
      const property = cart[index];
      localStorage.setItem('selectedProperty', JSON.stringify(property));
      window.location.href = '/appointment/book';
    }
  }
  
  // Clear cart functionality
  clearCartBtn.addEventListener('click', () => {
    if (confirm('Are you sure you want to clear your cart?')) {
      localStorage.removeItem('propertyCart');
      loadCart();
    }
  });
  
  // Load cart on page load
  loadCart();
});

// Optional: Update cart count in navbar
function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem('propertyCart')) || [];
  const cartCount = cart.length;
  
  // Update navbar cart icon if exists
  const cartIcon = document.querySelector('.cart-icon-count');
  if (cartIcon) {
    cartIcon.textContent = cartCount;
    cartIcon.style.display = cartCount > 0 ? 'inline-block' : 'none';
  }
}
</script>

<style>
.cart-container {
  min-height: 400px;
}

.empty-cart {
  text-align: center;
  padding: 50px 20px;
  background: #f8f9fa;
  border-radius: 10px;
  border: 2px dashed #dee2e6;
}

.empty-cart svg {
  color: #adb5bd;
  margin-bottom: 20px;
}

.empty-cart h3 {
  color: #495057;
  margin-bottom: 10px;
}

.empty-cart p {
  color: #6c757d;
  margin-bottom: 20px;
}

.cart-item-card {
  background: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
  height: 100%;
}

.cart-item-card:hover {
  transform: translateY(-5px);
}

.cart-item-img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.cart-item-content {
  padding: 15px;
}

.cart-item-content h4 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #333;
}

.cart-item-details {
  color: #666;
  font-size: 14px;
  margin-bottom: 10px;
  min-height: 40px;
}

.cart-item-price {
  color: #667eea;
  font-size: 16px;
  margin-bottom: 15px;
}

.cart-item-actions {
  display: flex;
  gap: 10px;
}

.book-now-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  flex: 2;
}

.remove-item-btn {
  flex: 1;
}

.cart-summary .card {
  border: none;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.cart-summary .card-title {
  color: #333;
  font-weight: 600;
}

@media (max-width: 768px) {
  .cart-item-actions {
    flex-direction: column;
  }
  
  .cart-item-card {
    margin-bottom: 20px;
  }
}
</style>
@endsection