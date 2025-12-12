@extends('layouts.app')

@section('title', 'Checkout - Book Your Property')

@section('content')
<div class="checkout-container">
    <div class="container py-5">
        <div class="row">
            <!-- Checkout Form -->
            <div class="col-lg-8">
                <div class="checkout-card">
                    <h2 class="checkout-title">📝 Complete Your Booking</h2>
                    <p class="checkout-subtitle">Fill in your details to secure your property</p>
                    
                    <div id="property-preview" class="property-preview mb-4">
                        <!-- Property preview will be loaded here via JavaScript -->
                    </div>
                    
                    <form id="checkoutForm" action="{{ route('appointment.process') }}" method="POST">
                        @csrf
                        <input type="hidden" id="propertyTitle" name="property_title">
                        <input type="hidden" id="propertyPrice" name="property_price">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="guests" class="form-label">Number of Guests *</label>
                                <select class="form-select" id="guests" name="guests" required>
                                    <option value="">Select guests</option>
                                    @for($i = 1; $i <= 20; $i++)
                                        <option value="{{ $i }}">{{ $i }} guest{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="check_in" class="form-label">Check-in Date *</label>
                                <input type="date" class="form-control" id="check_in" name="check_in" min="{{ date('Y-m-d') }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="check_out" class="form-label">Check-out Date *</label>
                                <input type="date" class="form-control" id="check_out" name="check_out" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Payment Method *</label>
                            <div class="payment-methods">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" required>
                                    <label class="form-check-label" for="credit_card">
                                        <span class="payment-icon">💳</span> Credit/Debit Card
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer" value="bank_transfer">
                                    <label class="form-check-label" for="bank_transfer">
                                        <span class="payment-icon">🏦</span> Bank Transfer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash">
                                    <label class="form-check-label" for="cash">
                                        <span class="payment-icon">💵</span> Cash on Arrival
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="notes" class="form-label">Additional Notes (Optional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Any special requests or requirements..."></textarea>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a> and <a href="#" class="text-decoration-none">Cancellation Policy</a>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100 checkout-btn">
                            <span class="btn-text">Complete Booking</span>
                            <span class="btn-spinner d-none">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="summary-card">
                    <h3 class="summary-title">Booking Summary</h3>
                    
                    <div id="summary-details" class="summary-details">
                        <!-- Summary will be loaded via JavaScript -->
                    </div>
                    
                    <div class="summary-total">
                        <div class="total-row">
                            <span>Subtotal</span>
                            <span id="subtotal">Rs 0</span>
                        </div>
                        <div class="total-row">
                            <span>Service Fee</span>
                            <span>Rs 2,500</span>
                        </div>
                        <div class="total-row">
                            <span>Security Deposit</span>
                            <span>Rs 10,000</span>
                        </div>
                        <div class="total-row total-amount">
                            <span><strong>Total Amount</strong></span>
                            <span id="total-amount"><strong>Rs 0</strong></span>
                        </div>
                    </div>
                    
                    <div class="summary-info">
                        <div class="info-item">
                            <span class="info-icon">🔒</span>
                            <span class="info-text">Secure payment encrypted</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🔄</span>
                            <span class="info-text">Free cancellation within 48 hours</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📞</span>
                            <span class="info-text">24/7 customer support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get selected property from localStorage
    const selectedProperty = JSON.parse(localStorage.getItem('selectedProperty'));
    const cart = JSON.parse(localStorage.getItem('propertyCart')) || [];
    
    // Determine which property to show
    let property = selectedProperty;
    
    // If no direct selected property, show first item from cart
    if (!property && cart.length > 0) {
        property = cart[0];
    }
    
    if (!property) {
        // No property selected, redirect to home
        window.location.href = '/';
        return;
    }
    
    // Update hidden form fields
    document.getElementById('propertyTitle').value = property.title;
    document.getElementById('propertyPrice').value = property.price;
    
    // Load property preview
    const propertyPreview = document.getElementById('property-preview');
    propertyPreview.innerHTML = `
        <div class="property-preview-card">
            <img src="${property.img}" alt="${property.title}" class="preview-image">
            <div class="preview-content">
                <h4>${property.title}</h4>
                <p class="preview-details">${property.details}</p>
                <p class="preview-price">${property.price}</p>
            </div>
        </div>
    `;
    
    // Load summary details
    const summaryDetails = document.getElementById('summary-details');
    summaryDetails.innerHTML = `
        <div class="summary-property">
            <h5>${property.title}</h5>
            <p>${property.details}</p>
        </div>
    `;
    
    // Extract price number from price string (e.g., "Rs 50,000/month")
    const priceMatch = property.price.match(/Rs ([\d,]+)/);
    let subtotal = 0;
    
    if (priceMatch) {
        subtotal = parseFloat(priceMatch[1].replace(/,/g, ''));
        document.getElementById('subtotal').textContent = `Rs ${subtotal.toLocaleString()}`;
        
        // Calculate total
        const serviceFee = 2500;
        const securityDeposit = 10000;
        const total = subtotal + serviceFee + securityDeposit;
        document.getElementById('total-amount').innerHTML = `<strong>Rs ${total.toLocaleString()}</strong>`;
    }
    
    // Set minimum check-out date
    const checkInInput = document.getElementById('check_in');
    const checkOutInput = document.getElementById('check_out');
    
    checkInInput.addEventListener('change', function() {
        if (this.value) {
            const checkInDate = new Date(this.value);
            const nextDay = new Date(checkInDate);
            nextDay.setDate(nextDay.getDate() + 1);
            
            const nextDayFormatted = nextDay.toISOString().split('T')[0];
            checkOutInput.min = nextDayFormatted;
            
            // If current check-out is before new min date, clear it
            if (checkOutInput.value && checkOutInput.value < nextDayFormatted) {
                checkOutInput.value = '';
            }
        }
    });
    
    // Form submission
    const checkoutForm = document.getElementById('checkoutForm');
    const checkoutBtn = checkoutForm.querySelector('.checkout-btn');
    
    checkoutForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate dates
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);
        
        if (checkOut <= checkIn) {
            alert('Check-out date must be after check-in date');
            return;
        }
        
        // Show loading state
        checkoutBtn.querySelector('.btn-text').classList.add('d-none');
        checkoutBtn.querySelector('.btn-spinner').classList.remove('d-none');
        checkoutBtn.disabled = true;
        
        // Clear localStorage items
        localStorage.removeItem('selectedProperty');
        
        // Clear cart if this was the only item
        if (cart.length === 1 && cart[0].title === property.title) {
            localStorage.removeItem('propertyCart');
        }
        
        // Submit form after a short delay to show loading state
        setTimeout(() => {
            this.submit();
        }, 1000);
    });
    
    // Real-time validation
    const inputs = checkoutForm.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
});
</script>

<style>
.checkout-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
}

.checkout-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.checkout-title {
    color: #333;
    font-weight: 700;
    margin-bottom: 10px;
}

.checkout-subtitle {
    color: #666;
    margin-bottom: 30px;
}

.property-preview-card {
    display: flex;
    gap: 20px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    border: 2px solid #e9ecef;
}

.preview-image {
    width: 120px;
    height: 120px;
    border-radius: 10px;
    object-fit: cover;
}

.preview-content h4 {
    color: #333;
    margin-bottom: 10px;
}

.preview-details {
    color: #666;
    margin-bottom: 10px;
    font-size: 14px;
}

.preview-price {
    color: #667eea;
    font-weight: 600;
    font-size: 18px;
}

.form-control, .form-select {
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-control.is-valid {
    border-color: #28a745;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.payment-methods {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.payment-icon {
    margin-right: 10px;
    font-size: 18px;
}

.form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
}

.checkout-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 15px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.checkout-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.summary-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 20px;
}

.summary-title {
    color: #333;
    font-weight: 700;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
}

.summary-property {
    margin-bottom: 25px;
}

.summary-property h5 {
    color: #333;
    margin-bottom: 10px;
}

.summary-property p {
    color: #666;
    font-size: 14px;
}

.summary-total {
    border-top: 2px solid #f0f0f0;
    padding-top: 20px;
    margin-bottom: 25px;
}

.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    color: #666;
}

.total-amount {
    border-top: 2px solid #f0f0f0;
    padding-top: 15px;
    margin-top: 15px;
    color: #333;
    font-size: 18px;
}

.summary-info {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.info-item:last-child {
    margin-bottom: 0;
}

.info-icon {
    margin-right: 10px;
    font-size: 16px;
}

.info-text {
    color: #666;
    font-size: 14px;
}

@media (max-width: 768px) {
    .checkout-container {
        background: none;
    }
    
    .checkout-card, .summary-card {
        padding: 25px;
        border-radius: 15px;
    }
    
    .property-preview-card {
        flex-direction: column;
        text-align: center;
    }
    
    .preview-image {
        width: 100%;
        height: 200px;
    }
    
    .summary-card {
        position: static;
        margin-top: 30px;
    }
}
</style>
@endsection 