@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Property Management</h1>
        <a href="{{ route('properties.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Property
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($properties as $property)
                        <tr>
                            <td>
                                <img src="{{ $property->image_url }}" alt="{{ $property->title }}" 
                                     style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                            </td>
                            <td>{{ $property->title }}</td>
                            <td>
                                <span class="badge bg-info text-capitalize">{{ $property->type }}</span>
                            </td>
                            <td>{{ $property->location }}, {{ $property->city }}</td>
                            <td>Rs {{ number_format($property->price) }}/{{ $property->price_type }}</td>
                            <td>
                                @if($property->is_available)
                                    <span class="badge bg-success">Available</span>
                                @else
                                    <span class="badge bg-danger">Not Available</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('properties.edit', $property) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('properties.destroy', $property) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this property?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No properties found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection