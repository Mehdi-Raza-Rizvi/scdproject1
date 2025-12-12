@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ isset($property) ? 'Edit Property' : 'Add New Property' }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($property) ? route('properties.update', $property) : route('properties.store') }}" method="POST">
                        @csrf
                        @if(isset($property))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $property->title ?? '') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Type *</label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="apartment" {{ old('type', $property->type ?? '') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                    <option value="house" {{ old('type', $property->type ?? '') == 'house' ? 'selected' : '' }}>House</option>
                                    <option value="office" {{ old('type', $property->type ?? '') == 'office' ? 'selected' : '' }}>Office</option>
                                    <option value="villa" {{ old('type', $property->type ?? '') == 'villa' ? 'selected' : '' }}>Villa</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" required>{{ old('description', $property->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="bedrooms" class="form-label">Bedrooms</label>
                                <input type="number" class="form-control @error('bedrooms') is-invalid @enderror" 
                                       id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms ?? '') }}">
                                @error('bedrooms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <input type="number" class="form-control @error('bathrooms') is-invalid @enderror" 
                                       id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms ?? '') }}">
                                @error('bathrooms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="size" class="form-label">Size (sqft)</label>
                                <input type="number" step="0.01" class="form-control @error('size') is-invalid @enderror" 
                                       id="size" name="size" value="{{ old('size', $property->size ?? '') }}">
                                @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location *</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location', $property->location ?? '') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City *</label>
                                <select class="form-select @error('city') is-invalid @enderror" id="city" name="city" required>
                                    <option value="">Select City</option>
                                    <option value="Karachi" {{ old('city', $property->city ?? '') == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                    <option value="Lahore" {{ old('city', $property->city ?? '') == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                    <option value="Islamabad" {{ old('city', $property->city ?? '') == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                                </select>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price *</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $property->price ?? '') }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="price_type" class="form-label">Price Type *</label>
                                <select class="form-select @error('price_type') is-invalid @enderror" id="price_type" name="price_type" required>
                                    <option value="">Select Price Type</option>
                                    <option value="month" {{ old('price_type', $property->price_type ?? '') == 'month' ? 'selected' : '' }}>Per Month</option>
                                    <option value="week" {{ old('price_type', $property->price_type ?? '') == 'week' ? 'selected' : '' }}>Per Week</option>
                                    <option value="day" {{ old('price_type', $property->price_type ?? '') == 'day' ? 'selected' : '' }}>Per Day</option>
                                </select>
                                @error('price_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image URL *</label>
                            <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                                   id="image_url" name="image_url" value="{{ old('image_url', $property->image_url ?? '') }}" required>
                            <small class="text-muted">Enter a valid URL for the property image</small>
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(isset($property))
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" 
                                       {{ old('is_available', $property->is_available ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_available">
                                    Available for rent
                                </label>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('properties.admin') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                {{ isset($property) ? 'Update Property' : 'Create Property' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection