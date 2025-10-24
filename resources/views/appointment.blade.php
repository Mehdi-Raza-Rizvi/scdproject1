@extends('layouts.app')

@section('content')

<section class="appointment-hero">
    <h1>Booked Appointments</h1>
    <p>Here are the properties you selected for visit</p>
</section>

<section class="appointment-section">
    @if(session('appointments') && count(session('appointments')) > 0)
        <ul class="appointment-list">
            @foreach(session('appointments') as $ap)
                <li>Property ID: {{ $ap }}</li>
            @endforeach
        </ul>
    @else
        <p class="no-appointments">No appointments booked yet.</p>
    @endif
</section>

@endsection
