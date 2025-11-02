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
  <div id="formSuccess" class="sell-success">Your property has been submitted successfully!</div>

  <div class="sell-flex">

    <!-- Property Form -->
    <div class="sell-form">
      <h2>Property Details</h2>
      <form id="propertyForm">

        <label>Listing Title</label>
        <input type="text" placeholder="Modern Apartment in Clifton" required>

        <label>Property Type</label>
        <select required>
          <option value="">Select Type</option>
          <option>Apartment</option>
          <option>House</option>
          <option>Villa</option>
          <option>Office</option>
          <option>Plot</option>
        </select>

        <div class="sell-grid">
          <div>
            <label>City</label>
            <input type="text" placeholder="Karachi" required>
          </div>
          <div>
            <label>Price (PKR)</label>
            <input type="number" placeholder="Rs 85000" required>
          </div>
          <div>
            <label>Area (sqft)</label>
            <input type="number" placeholder="1200">
          </div>
        </div>

        <div class="sell-grid">
          <div>
            <label>Beds</label>
            <input type="number" placeholder="3">
          </div>
          <div>
            <label>Baths</label>
            <input type="number" placeholder="2">
          </div>
          <div>
            <label>Condition</label>
            <select>
              <option value="">Select</option>
              <option>New</option>
              <option>Good</option>
              <option>Needs Renovation</option>
            </select>
          </div>
        </div>

        <label>Description</label>
        <textarea rows="4" placeholder="Describe your property..."></textarea>

        <label>Upload Images</label>
        <input type="file" multiple accept="image/*">

        <button type="submit" class="sell-btn">Submit Listing</button>
      </form>
    </div>

    <!-- Owner Form -->
    <div class="owner-form">
      <h2>Owner Contact</h2>
      <form id="ownerForm">

        <label>Name</label>
        <input type="text" placeholder="Full Name" required>

        <label>Phone</label>
        <input type="text" placeholder="+92-3xx-xxxxxxx" required>

        <label>Email (optional)</label>
        <input type="email" placeholder="you@example.com">

        <label>Preferred Contact Time</label>
        <input type="text" placeholder="9am - 6pm">

        <button type="submit" class="sell-btn">Save Contact</button>
      </form>
    </div>

  </div>
</section>

<script>
  // Property form
  document.getElementById('propertyForm').addEventListener('submit', e => {
    e.preventDefault();
    document.getElementById('formSuccess').style.display = 'block';
    e.target.reset();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Owner form
  document.getElementById('ownerForm').addEventListener('submit', e => {
    e.preventDefault();
    alert('Your contact information has been saved!');
    e.target.reset();
  });
</script>

@endsection