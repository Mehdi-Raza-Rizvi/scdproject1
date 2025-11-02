@extends('layouts.app')

@section('content')
<section class="cart-page container">
  <h2>Your Property Cart</h2>
  <div id="cartContainer" class="grid"></div>

  <button id="checkoutBtn" class="btn">Proceed to Checkout</button>
</section>

<script>
const cartContainer = document.getElementById('cartContainer');
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to render cart items
function renderCart() {
  if (cart.length === 0) {
    cartContainer.innerHTML = "<p>Your cart is empty.</p>";
    return;
  }

  cartContainer.innerHTML = cart.map((item, index) => `
    <div class="card5">
      <img src="${item.img}" alt="${item.title}">
      <h3>${item.title}</h3>
      <p>${item.price}</p>
      <button class="btn remove-btn" data-index="${index}">❌ Remove</button>
    </div>
  `).join('');

  // Attach remove handlers
  document.querySelectorAll('.remove-btn').forEach(btn => {
    btn.addEventListener('click', e => {
      const index = e.target.dataset.index;
      removeFromCart(index);
    });
  });
}

// Remove item from cart
function removeFromCart(index) {
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCart(); // re-render
}

// Checkout button
document.getElementById('checkoutBtn').addEventListener('click', () => {
  if (cart.length === 0) {
    alert("Your cart is empty!");
  } else {
    alert("Proceeding to Checkout...");
  }
});

// Initial render
renderCart();
</script>

<style>

</style>
@endsection