@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Property</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('properties.update', $property) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        @include('properties.form')
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('properties.admin') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection