@extends('layouts.app')

@section('content')
<section class="appointment-section">
  <div class="container">
    <h2 class="section-title">📅 Your Appointments</h2>
    <p class="section-subtitle">View and manage your scheduled property appointments below.</p>

    <div id="appointment-container" class="appointment-container">
      <p class="no-appointment">No appointment scheduled yet.</p>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const appointmentContainer = document.getElementById('appointment-container');
  const stored = localStorage.getItem('selectedProperty');

  if (stored) {
    const property = JSON.parse(stored);
    appointmentContainer.innerHTML = `
      <div class="appointment-card">
        <img src="${property.img}" alt="${property.title}">
        <h3>${property.title}</h3>
        <p>${property.details}</p>
        <p><strong>${property.price}</strong></p>
        <button class="cancel-btn">Cancel Appointment</button>
      </div>
    `;

    document.querySelector('.cancel-btn').addEventListener('click', () => {
      localStorage.removeItem('selectedProperty');
      appointmentContainer.innerHTML = '<p class="no-appointment">No appointment scheduled.</p>';
    });
  }
});
</script>
@endsection