@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="sell-hero" style=" background: url('https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?_gl=1*yh453r*_ga*NzAzNjIzNTYuMTc2MTkyMzgxOA..*_ga_8JE65Q40S6*czE3NjE5MjM4MTckbzEkZzEkdDE3NjE5MjM4MjEkajU2JGwwJGgw') center/cover no-repeat; height: auto;  ">
  <h1>Sell Your Property</h1>
  <p>List your property today and connect with verified buyers easily.</p>
</section>

<!-- Sell Section -->
<section class="sell-container">

  <!-- Success Message -->
  @if(session('success'))
    <div id="formSuccess" class="sell-success" style="display: block;">
        {{ session('success') }}
    </div>
  @else
    <div id="formSuccess" class="sell-success">Your property has been submitted successfully!</div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="sell-flex">

    <!-- Property Form -->
    <div class="sell-form">
      <h2>Property Details</h2>
      <form id="propertyForm" action="{{ route('properties.sell') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Listing Title *</label>
            <input type="text" name="title" placeholder="Modern Apartment in Clifton" 
                   value="{{ old('title') }}" required class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Property Type *</label>
            <select name="type" required class="form-select @error('type') is-invalid @enderror">
                <option value="">Select Type</option>
                <option value="apartment" {{ old('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                <option value="house" {{ old('type') == 'house' ? 'selected' : '' }}>House</option>
                <option value="villa" {{ old('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                <option value="office" {{ old('type') == 'office' ? 'selected' : '' }}>Office</option>
            </select>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="sell-grid">
          <div class="mb-3">
            <label class="form-label">City *</label>
            <select name="city" required class="form-select @error('city') is-invalid @enderror">
                <option value="">Select City</option>
                <option value="Karachi" {{ old('city') == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                <option value="Lahore" {{ old('city') == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                <option value="Islamabad" {{ old('city') == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
            </select>
            @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label class="form-label">Price (PKR) *</label>
            <input type="number" name="price" placeholder="85000" 
                   value="{{ old('price') }}" required 
                   class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label class="form-label">Price Type *</label>
            <select name="price_type" required class="form-select @error('price_type') is-invalid @enderror">
                <option value="">Select Price Type</option>
                <option value="month" {{ old('price_type') == 'month' ? 'selected' : '' }}>Per Month</option>
                <option value="week" {{ old('price_type') == 'week' ? 'selected' : '' }}>Per Week</option>
                <option value="day" {{ old('price_type') == 'day' ? 'selected' : '' }}>Per Day</option>
            </select>
            @error('price_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="sell-grid">
          <div class="mb-3">
            <label class="form-label">Beds</label>
            <input type="number" name="bedrooms" placeholder="3" 
                   value="{{ old('bedrooms') }}" 
                   class="form-control @error('bedrooms') is-invalid @enderror">
            @error('bedrooms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label class="form-label">Baths</label>
            <input type="number" name="bathrooms" placeholder="2" 
                   value="{{ old('bathrooms') }}" 
                   class="form-control @error('bathrooms') is-invalid @enderror">
            @error('bathrooms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label class="form-label">Area (sqft)</label>
            <input type="number" name="size" placeholder="1200" 
                   value="{{ old('size') }}" 
                   class="form-control @error('size') is-invalid @enderror">
            @error('size')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Location *</label>
            <input type="text" name="location" placeholder="DHA Phase 6, Clifton Block 8, etc." 
                   value="{{ old('location') }}" required 
                   class="form-control @error('location') is-invalid @enderror">
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description *</label>
            <textarea name="description" rows="4" placeholder="Describe your property..." 
                      required class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image URL *</label>
            <input type="url" name="image_url" placeholder="https://example.com/property-image.jpg" 
                   value="{{ old('image_url') }}" required 
                   class="form-control @error('image_url') is-invalid @enderror">
            @error('image_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Enter a valid URL for the property image</small>
        </div>

        <!-- Hidden field to indicate this is from frontend form -->
        <input type="hidden" name="is_available" value="1">
        <input type="hidden" name="source" value="frontend">

        <button type="submit" class="sell-btn">Submit Listing</button>
      </form>
    </div>

    <!-- Owner Form (Optional - You can integrate this later) -->
    <div class="owner-form">
      <h2>Property Owner Information</h2>
      <p class="text-muted mb-4">This section is optional. You can add owner details later.</p>
      
      <div class="owner-info">
          <h4>Tips for a Great Listing:</h4>
          <ul>
              <li>Use high-quality images</li>
              <li>Provide accurate measurements</li>
              <li>Be specific about the location</li>
              <li>Mention nearby amenities</li>
              <li>Set a competitive price</li>
          </ul>
          
          <h4 class="mt-4">What Happens Next:</h4>
          <ul>
              <li>Your listing will be reviewed</li>
              <li>It will appear on the homepage</li>
              <li>Potential buyers can contact you</li>
              <li>You can manage listings from your account</li>
          </ul>
      </div>
    </div>

  </div>
</section>

<style>
.sell-container {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.sell-hero {
    text-align: center;
    padding: 4rem 2rem;
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.sell-hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.sell-hero p {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
}

.sell-flex {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
}

.sell-form, .owner-form {
    flex: 1;
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.sell-form h2, .owner-form h2 {
    margin-bottom: 1.5rem;
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 0.5rem;
}

.sell-success {
    background: #d4edda;
    color: #155724;
    padding: 1rem;
    border-radius: 5px;
    margin-bottom: 1rem;
    display: none;
}

.sell-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #555;
}

.form-control, .form-select {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.form-control:focus, .form-select:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
}

.is-invalid {
    border-color: #dc3545;
}

.is-invalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 2px rgba(220,53,69,0.25);
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.sell-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s;
    margin-top: 1rem;
}

.sell-btn:hover {
    background: #0056b3;
}

.owner-info {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 5px;
    border-left: 4px solid #007bff;
}

.owner-info h4 {
    color: #333;
    margin-bottom: 0.5rem;
}

.owner-info ul {
    margin-left: 1.5rem;
    margin-bottom: 1rem;
}

.owner-info li {
    margin-bottom: 0.5rem;
    color: #666;
}

@media (max-width: 768px) {
    .sell-flex {
        flex-direction: column;
    }
    
    .sell-grid {
        grid-template-columns: 1fr;
    }
    
    .sell-hero h1 {
        font-size: 2rem;
    }
    
    .sell-container {
        padding: 1rem;
    }
}
</style>

<script>
// Show success message on form submission
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        document.getElementById('formSuccess').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Auto-hide success message after 5 seconds
        setTimeout(function() {
            document.getElementById('formSuccess').style.display = 'none';
        }, 5000);
    @endif
    
    // Form validation
    const form = document.getElementById('propertyForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields marked with *');
            }
        });
        
        // Clear validation on input
        form.querySelectorAll('input, select, textarea').forEach(field => {
            field.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });
    }
});
</script>

@endsection