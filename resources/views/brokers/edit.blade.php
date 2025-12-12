@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">Edit Broker: {{ $broker->name }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('brokers.update', $broker->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ old('name', $broker->name) }}" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email', $broker->email) }}" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone *</label>
                                <input type="text" class="form-control" id="phone" name="phone" 
                                       value="{{ old('phone', $broker->phone) }}" required>
                                @error('phone')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City *</label>
                                <select class="form-select" id="city" name="city" required>
                                    <option value="">Select City</option>
                                    <option value="Karachi" {{ old('city', $broker->city) == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                    <option value="Lahore" {{ old('city', $broker->city) == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                    <option value="Islamabad" {{ old('city', $broker->city) == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                                    <option value="Rawalpindi" {{ old('city', $broker->city) == 'Rawalpindi' ? 'selected' : '' }}>Rawalpindi</option>
                                    <option value="Faisalabad" {{ old('city', $broker->city) == 'Faisalabad' ? 'selected' : '' }}>Faisalabad</option>
                                    <option value="Multan" {{ old('city', $broker->city) == 'Multan' ? 'selected' : '' }}>Multan</option>
                                    <option value="Peshawar" {{ old('city', $broker->city) == 'Peshawar' ? 'selected' : '' }}>Peshawar</option>
                                    <option value="Quetta" {{ old('city', $broker->city) == 'Quetta' ? 'selected' : '' }}>Quetta</option>
                                </select>
                                @error('city')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="experience_years" class="form-label">Experience (Years) *</label>
                                <input type="text" class="form-control" id="experience_years" name="experience_years" 
                                       value="{{ old('experience_years', $broker->experience_years) }}" required>
                                @error('experience_years')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="specialization" class="form-label">Specialization *</label>
                                <select class="form-select" id="specialization" name="specialization" required>
                                    <option value="">Select Specialization</option>
                                    <option value="Residential" {{ old('specialization', $broker->specialization) == 'Residential' ? 'selected' : '' }}>Residential</option>
                                    <option value="Commercial" {{ old('specialization', $broker->specialization) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                                    <option value="Industrial" {{ old('specialization', $broker->specialization) == 'Industrial' ? 'selected' : '' }}>Industrial</option>
                                    <option value="Luxury Properties" {{ old('specialization', $broker->specialization) == 'Luxury Properties' ? 'selected' : '' }}>Luxury Properties</option>
                                    <option value="Rental" {{ old('specialization', $broker->specialization) == 'Rental' ? 'selected' : '' }}>Rental</option>
                                    <option value="Sales" {{ old('specialization', $broker->specialization) == 'Sales' ? 'selected' : '' }}>Sales</option>
                                    <option value="Property Management" {{ old('specialization', $broker->specialization) == 'Property Management' ? 'selected' : '' }}>Property Management</option>
                                </select>
                                @error('specialization')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" 
                                          rows="4">{{ old('description', $broker->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-muted">Leave empty to keep current image</small>
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                
                                @if($broker->image_url)
                                    <div class="mt-3">
                                        <p class="mb-1">Current Image:</p>
                                        <img src="{{ $broker->image_url }}" alt="{{ $broker->name }}" 
                                             class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="mt-2">
                                            <a href="{{ $broker->image_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt"></i> View Full Image
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-2">
                                        <span class="badge bg-warning text-dark">No image uploaded</span>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-check mt-4 pt-2">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                           value="1" {{ old('is_active', $broker->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active Broker (Visible on website)
                                    </label>
                                </div>
                                <div class="mt-3">
                                    <p class="mb-1">Status:</p>
                                    <span class="badge bg-{{ $broker->is_active ? 'success' : 'danger' }}">
                                        {{ $broker->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Created At</h6>
                                        <p class="card-text">{{ $broker->created_at->format('F d, Y h:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Last Updated</h6>
                                        <p class="card-text">{{ $broker->updated_at->format('F d, Y h:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save"></i> Update Broker
                                </button>
                                <a href="{{ route('brokers.admin') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('brokers.index') }}" target="_blank" class="btn btn-outline-info">
                                    <i class="fas fa-eye"></i> View on Website
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.card-header {
    border-radius: 8px 8px 0 0 !important;
}
.form-control:focus, .form-select:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
}
.img-thumbnail {
    border: 2px solid #dee2e6;
    padding: 4px;
}
.bg-light {
    background-color: #f8f9fa !important;
}
</style>
@endsection