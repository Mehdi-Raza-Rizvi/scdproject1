<x-guest-layout>
    <div class="login-container">
        <!-- Left Side - Branding & Image -->
        <div class="login-left">
            <div class="brand-section">
                <div class="brand-logo">
                   
                    <span>Rental<span class="brand-accent">Hub</span></span>
                </div>
                <h1 class="brand-title">Welcome Back!</h1>
                <p class="brand-subtitle">Sign in to access your property dashboard and manage your rentals.</p>
            </div>
            
            <div class="login-image">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Modern Property">
                <div class="image-overlay">
                    <div class="overlay-content">
                        <h3>Find Your Perfect Property</h3>
                        <p>Thousands of premium rentals waiting for you</p>
                    </div>
                </div>
            </div>
            
            <div class="login-features">
                <div class="feature-item">
                    
                    <span>Verified Properties</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                    </div>
                    <span>Trusted Brokers</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                    </div>
                    <span>Secure Booking</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="login-card">
                <!-- Session Status -->
                <x-auth-session-status class="login-status" :status="session('status')" />

                <div class="form-header">
                    <h2>Sign In</h2>
                    <p>Enter your credentials to continue</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <div class="input-group">
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="error-message" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="error-message" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="form-options">
                        <label class="remember-me">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="checkmark"></span>
                            <span>{{ __('Remember me') }}</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="login-button">
                        <span class="button-text">{{ __('Sign In') }}</span>
                        <span class="button-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </span>
                    </button>

                    <!-- Divider -->
                    <div class="divider">
                        <span>or</span>
                    </div>

                    <!-- Social Login (Optional) -->
                    <div class="social-login">
                        <button type="button" class="social-button google">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span>Continue with Google</span>
                        </button>
                        
                        <button type="button" class="social-button facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#1877F2">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>Continue with Facebook</span>
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="register-link">
                        <p>Don't have an account? 
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Sign up here</a>
                            @endif
                        </p>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="login-footer">
                <p>© 2024 RentalHub. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Help Center</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.querySelector('.password-toggle');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                </svg>
            `;
        } else {
            passwordInput.type = 'password';
            toggleButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
            `;
        }
    }
    
    // Add focus effects
    document.querySelectorAll('.input-group input').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });
    </script>

    <style>
    .login-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    /* Left Side Styles */
    .login-left {
        flex: 1;
        background: white;
        padding: 40px;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }
    
    .brand-section {
        margin-bottom: 40px;
    }
    
    .brand-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    
    .brand-logo svg {
        color: #667eea;
    }
    
    .brand-accent {
        color: #764ba2;
    }
    
    .brand-title {
        font-size: 36px;
        font-weight: 800;
        color: #333;
        margin-bottom: 10px;
        line-height: 1.2;
    }
    
    .brand-subtitle {
        color: #666;
        font-size: 16px;
        line-height: 1.6;
        max-width: 400px;
    }
    
    .login-image {
        flex: 1;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
    }
    
    .login-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 30px;
        color: white;
    }
    
    .overlay-content h3 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .overlay-content p {
        opacity: 0.9;
        font-size: 14px;
    }
    
    .login-features {
        display: flex;
        gap: 20px;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        background: #f8f9fa;
        border-radius: 10px;
        flex: 1;
    }
    
    .feature-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-icon svg {
        color: white;
    }
    
    .feature-item span {
        font-weight: 500;
        color: #333;
    }
    
    /* Right Side Styles */
    .login-right {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .login-card {
        background: white;
        border-radius: 25px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 480px;
    }
    
    .login-status {
        padding: 12px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 14px;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .form-header h2 {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
    }
    
    .form-header p {
        color: #666;
        font-size: 16px;
    }
    
    .login-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .input-group {
        position: relative;
        display: flex;
        align-items: center;
        background: #f8f9fa;
        border-radius: 12px;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .input-group.focused {
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .input-icon {
        padding: 0 20px;
        display: flex;
        align-items: center;
        color: #666;
    }
    
    .input-group input {
        flex: 1;
        padding: 18px 0;
        background: transparent;
        border: none;
        font-size: 16px;
        color: #333;
    }
    
    .input-group input:focus {
        outline: none;
    }
    
    .input-group input::placeholder {
        color: #999;
    }
    
    .password-toggle {
        background: none;
        border: none;
        padding: 0 20px;
        cursor: pointer;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .password-toggle:hover {
        color: #667eea;
    }
    
    .error-message {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        padding-left: 10px;
    }
    
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
    
    .remember-me {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        color: #666;
        font-size: 14px;
    }
    
    .remember-me input {
        display: none;
    }
    
    .checkmark {
        width: 20px;
        height: 20px;
        border: 2px solid #ddd;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .remember-me input:checked + .checkmark {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
    }
    
    .checkmark::after {
        content: '✓';
        color: white;
        font-size: 12px;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .remember-me input:checked + .checkmark::after {
        opacity: 1;
    }
    
    .forgot-password {
        color: #667eea;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .forgot-password:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    .login-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 18px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    
    .login-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }
    
    .button-icon {
        display: flex;
        align-items: center;
    }
    
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 20px 0;
        color: #999;
    }
    
    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e9ecef;
    }
    
    .divider span {
        padding: 0 15px;
        font-size: 14px;
    }
    
    .social-login {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .social-button {
        padding: 16px;
        border-radius: 12px;
        border: 2px solid #e9ecef;
        background: white;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
    }
    
    .social-button:hover {
        border-color: #667eea;
        transform: translateY(-1px);
    }
    
    .social-button.google {
        color: #333;
    }
    
    .social-button.facebook {
        color: #1877F2;
    }
    
    .register-link {
        text-align: center;
        margin-top: 25px;
        color: #666;
        font-size: 15px;
    }
    
    .register-link a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
    }
    
    .register-link a:hover {
        text-decoration: underline;
    }
    
    .login-footer {
        margin-top: 40px;
        text-align: center;
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
    }
    
    .footer-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 10px;
    }
    
    .footer-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }
    
    .footer-links a:hover {
        color: white;
        text-decoration: underline;
    }
    
    /* Responsive Design */
    @media (max-width: 1024px) {
        .login-container {
            flex-direction: column;
        }
        
        .login-left {
            display: none;
        }
        
        .login-right {
            padding: 20px;
        }
        
        .login-card {
            padding: 30px;
            max-width: 100%;
        }
    }
    
    @media (max-width: 480px) {
        .login-card {
            padding: 25px;
        }
        
        .form-header h2 {
            font-size: 28px;
        }
        
        .login-features {
            flex-direction: column;
        }
        
        .social-button {
            font-size: 13px;
        }
    }
    </style>
</x-guest-layout>