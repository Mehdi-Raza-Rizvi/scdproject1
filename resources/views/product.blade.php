@extends('layouts.app')

@section('content')

<section class="product-hero">
  <div class="overlay">
    <br><br><br><br>
    <h1 id="property-title">Property Title</h1>
  </div>
</section>

<section class="product-details container">
  <div class="product-info">
    <img id="property-img" src="" alt="Property Image" class="property-img">
    <div class="product-text">
      <h2 id="property-title-2">Title</h2>
      <p id="property-details">Property details here...</p>
      <p id="property-price"><strong>Price:</strong></p>

      <!-- ✅ Add to Cart button -->
      <button class="btn" id="addToCartBtn">Add to Cart</button>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const stored = localStorage.getItem('selectedProperty');

  if (stored) {
    const property = JSON.parse(stored);

    // Populate product info
    document.querySelector('.product-hero').style.backgroundImage = `url(${property.img})`;
    document.getElementById('property-title').textContent = property.title;
    document.getElementById('property-title-2').textContent = property.title;
    document.getElementById('property-details').textContent = property.details;
    document.getElementById('property-price').innerHTML = `<strong>Price:</strong> ${property.price}`;
    document.getElementById('property-img').src = property.img;

    // ✅ Add to Cart functionality
    document.getElementById('addToCartBtn').addEventListener('click', () => {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.push(property);
      localStorage.setItem('cart', JSON.stringify(cart));
      alert("✅ Property added to cart!");
    });
  } else {
    console.warn("No property found in localStorage.");
  }
});
</script>

@endsection
