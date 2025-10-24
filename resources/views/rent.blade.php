@extends('layouts.app')

@section('content')
<div class="page-container">

    <!-- Rent Filter Section -->
    <div class="rent-filter-box">
        <h2>Find Rental Properties</h2>

        <div class="filter-row">
            <!-- Location Dropdown -->
            <select>
                <option value="">Select Location</option>
                <option value="karachi">Karachi</option>
                <option value="lahore">Lahore</option>
            </select>

            <!-- Rent Price Type Dropdown -->
            <select>
                <option value="">Rent Price Type</option>
                <option value="month">Per Month</option>
                <option value="week">Per Week</option>
                <option value="day">Per Day</option>
            </select>

            <button class="btn">Apply</button>
        </div>
    </div>

    <!-- Property Listing Section -->
    <div class="rent-list">

        <!-- Sample Property 1 -->
        <div class="card">
            <img src="https://via.placeholder.com/300" alt="">
            <p class="title">2 Bedroom Apartment – Karachi</p>
            <p class="details">2 Beds | 1 Bath | PKR 40,000 / month</p>
            <a href="{{ route('appointment.add', ['id' => 1]) }}" class="btn">Book Appointment</a>
        </div>

        <!-- Sample Property 2 -->
        <div class="card">
            <img src="https://via.placeholder.com/300" alt="">
            <p class="title">Furnished Studio – Lahore</p>
            <p class="details">1 Bed | 1 Bath | PKR 18,000 / week</p>
            <a href="{{ route('appointment.add', ['id' => 2]) }}" class="btn">Book Appointment</a>
        </div>

        <!-- Sample Property 3 -->
        <div class="card">
            <img src="https://via.placeholder.com/300" alt="">
            <p class="title">Modern Flat – Karachi</p>
            <p class="details">3 Beds | 2 Baths | PKR 5,000 / day</p>
            <a href="{{ route('appointment.add', ['id' => 3]) }}" class="btn">Book Appointment</a>
        </div>

        <!-- Sample Property 4 -->
        <div class="card">
            <img src="https://via.placeholder.com/300" alt="">
            <p class="title">Luxury Villa – Lahore</p>
            <p class="details">4 Beds | 3 Baths | PKR 150,000 / month</p>
            <a href="{{ route('appointment.add', ['id' => 4]) }}" class="btn">Book Appointment</a>
        </div>

    </div>

</div>
@endsection
