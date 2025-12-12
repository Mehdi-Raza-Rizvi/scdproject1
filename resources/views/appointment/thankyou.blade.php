@extends('layouts.app')

@section('title', 'Thank You - Booking Confirmed')

@section('content')
<div class="thank-you-container">
    <div class="container">
        <div class="thank-you-card">
            <!-- Success Icon -->
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            
            <!-- Success Message -->
            <h1 class="thank-you-title">Booking Confirmed! 🎉</h1>
            <p class="thank-you-subtitle">Your property reservation has been successfully completed</p>
            <div class="booking-id">
                Booking ID: <strong>{{ $bookingId ?? 'BK-' . time() }}</strong>
            </div>
            
            <!-- Booking Details -->
            <div class="booking-details">
                <h3 class="details-title">Booking Summary</h3>
                
                <div class="details-grid">
                    <div class="detail-item">
                        <span class="detail-label">Property:</span>
                        <span class="detail-value">{{ $bookingData['property_title'] ?? 'N/A' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Check-in:</span>
                        <span class="detail-value">{{ date('F d, Y', strtotime($bookingData['check_in'] ?? now())) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Check-out:</span>
                        <span class="detail-value">{{ date('F d, Y', strtotime($bookingData['check_out'] ?? now()->addDays(3))) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Guests:</span>
                        <span class="detail-value">{{ $bookingData['guests'] ?? 1 }} guest{{ ($bookingData['guests'] ?? 1) > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Total Price:</span>
                        <span class="detail-value">{{ $bookingData['property_price'] ?? 'Rs 0' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Payment Method:</span>
                        <span class="detail-value">
                            @php
                                $paymentMethod = $bookingData['payment_method'] ?? 'cash';
                                $paymentMethods = [
                                    'credit_card' => '💳 Credit Card',
                                    'bank_transfer' => '🏦 Bank Transfer',
                                    'cash' => '💵 Cash on Arrival'
                                ];
                            @endphp
                            {{ $paymentMethods[$paymentMethod] ?? 'Cash on Arrival' }}
                        </span>
                    </div>
                </div>
                
                <!-- Guest Details -->
                <div class="guest-details mt-4">
                    <h4 class="guest-title">Guest Information</h4>
                    <div class="guest-info">
                        <p><strong>Name:</strong> {{ $bookingData['name'] ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $bookingData['email'] ?? 'N/A' }}</p>
                        <p><strong>Phone:</strong> {{ $bookingData['phone'] ?? 'N/A' }}</p>
                        @if(!empty($bookingData['notes']))
                            <p><strong>Special Notes:</strong> {{ $bookingData['notes'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div class="next-steps">
                <h3 class="steps-title">What's Next?</h3>
                <div class="steps-grid">
                    <div class="step-item">
                        <div class="step-icon">📧</div>
                        <h4>Confirmation Email</h4>
                        <p>Check your email for booking confirmation and details</p>
                    </div>
                    <div class="step-item">
                        <div class="step-icon">📱</div>
                        <h4>Property Contact</h4>
                        <p>You'll receive a call within 24 hours to confirm details</p>
                    </div>
                    <div class="step-item">
                        <div class="step-icon">🗓️</div>
                        <h4>Check-in Reminder</h4>
                        <p>We'll send a reminder 48 hours before check-in</p>
                    </div>
                </div>
            </div>
            
            <!-- Important Notes -->
            <div class="important-notes">
                <h4 class="notes-title">Important Information</h4>
                <ul class="notes-list">
                    <li>Please bring a valid ID for check-in</li>
                    <li>Check-in time is after 2:00 PM</li>
                    <li>Check-out time is before 11:00 AM</li>
                    <li>Cancellation is free up to 48 hours before check-in</li>
                    <li>Security deposit will be refunded after property inspection</li>
                </ul>
            </div>
            
            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Back to Home
                </a>
                <button onclick="window.print()" class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Print Receipt
                </button>
                <a href="mailto:?subject=My Booking Confirmation&body=Check out my booking details!" class="btn btn-outline-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Share via Email
                </a>
            </div>
            
            <!-- Support Info -->
            <div class="support-info">
                <p class="support-text">
                    Need help? Contact our support team at 
                    <a href="tel:+923001234567" class="support-link">+92 300 1234567</a> or 
                    <a href="mailto:support@rentalapp.com" class="support-link">support@rentalapp.com</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
.thank-you-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 40px 20px;
}

.thank-you-card {
    background: white;
    border-radius: 25px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.success-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
}

.success-icon svg {
    color: white;
}

.thank-you-title {
    color: #333;
    font-weight: 800;
    font-size: 42px;
    margin-bottom: 15px;
}

.thank-you-subtitle {
    color: #666;
    font-size: 18px;
    margin-bottom: 20px;
}

.booking-id {
    background: #f0f9ff;
    color: #0369a1;
    padding: 12px 25px;
    border-radius: 50px;
    display: inline-block;
    font-size: 16px;
    margin-bottom: 40px;
    border: 2px dashed #0ea5e9;
}

.booking-details {
    background: #f8fafc;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 40px;
    text-align: left;
}

.details-title {
    color: #333;
    font-weight: 700;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e5e7eb;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background: white;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
}

.detail-label {
    color: #666;
    font-weight: 500;
}

.detail-value {
    color: #333;
    font-weight: 600;
}

.guest-details {
    background: white;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
}

.guest-title {
    color: #333;
    font-weight: 600;
    margin-bottom: 15px;
}

.guest-info p {
    margin-bottom: 8px;
    color: #555;
}

.next-steps {
    margin-bottom: 40px;
}

.steps-title {
    color: #333;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
}

.steps-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.step-item {
    text-align: center;
    padding: 25px;
    background: white;
    border-radius: 15px;
    border: 2px solid #f0f0f0;
    transition: all 0.3s ease;
}

.step-item:hover {
    transform: translateY(-5px);
    border-color: #667eea;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.1);
}

.step-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

.step-item h4 {
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.step-item p {
    color: #666;
    font-size: 14px;
    line-height: 1.5;
}

.important-notes {
    background: #fff7ed;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 40px;
    border: 2px solid #fed7aa;
}

.notes-title {
    color: #ea580c;
    font-weight: 700;
    margin-bottom: 20px;
}

.notes-list {
    list-style: none;
    padding: 0;
    text-align: left;
}

.notes-list li {
    color: #666;
    margin-bottom: 10px;
    padding-left: 25px;
    position: relative;
}

.notes-list li:before {
    content: "⚠️";
    position: absolute;
    left: 0;
    top: 2px;
}

.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 40px;
}

.action-buttons .btn {
    padding: 12px 25px;
    border-radius: 10px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
}

.support-info {
    padding-top: 30px;
    border-top: 2px dashed #e5e7eb;
}

.support-text {
    color: #666;
    font-size: 15px;
}

.support-link {
    color: #667eea;
    font-weight: 600;
    text-decoration: none;
}

.support-link:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .thank-you-card {
        padding: 30px 20px;
        border-radius: 20px;
    }
    
    .thank-you-title {
        font-size: 32px;
    }
    
    .details-grid {
        grid-template-columns: 1fr;
    }
    
    .steps-grid {
        grid-template-columns: 1fr;
    }
    
    .step-item {
        padding: 20px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .action-buttons .btn {
        width: 100%;
        justify-content: center;
    }
}

@media print {
    .thank-you-container {
        background: white;
        padding: 0;
    }
    
    .thank-you-card {
        box-shadow: none;
        padding: 20px;
    }
    
    .action-buttons,
    .support-info {
        display: none;
    }
}
</style>
@endsection