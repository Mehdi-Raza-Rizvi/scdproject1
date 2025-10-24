@extends('layouts.app')

@section('content')

<section class="sell-hero">
    <h1>Sell Your Property</h1>
    <p>Submit property details to list it on our platform</p>
</section>

<section class="sell-section">
    <form class="sell-form">

        <label>Owner Name</label>
        <input type="text" placeholder="Enter your name">

        <label>Property Title</label>
        <input type="text" placeholder="e.g., 5 Marla House">

        <label>City / Area</label>
        <input type="text" placeholder="e.g., Karachi - DHA">

        <label>Price</label>
        <input type="number" placeholder="PKR">

        <label>Description</label>
        <textarea placeholder="Write brief property details..." rows="4"></textarea>

        <button type="submit" class="sell-btn">Submit Listing</button>
    </form>
</section>

@endsection
