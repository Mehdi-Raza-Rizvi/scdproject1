@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Brokers Management</h1>
        <a href="{{ route('brokers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Broker
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
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Experience</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brokers as $broker)
                        <tr>
                            <td>{{ $broker->id }}</td>
                            <td>
                                @if($broker->image_url)
                                    <img src="{{ $broker->image_url }}" alt="{{ $broker->name }}" 
                                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <div style="width: 50px; height: 50px; background: #eee; border-radius: 50%;"></div>
                                @endif
                            </td>
                            <td>{{ $broker->name }}</td>
                            <td>{{ $broker->email }}</td>
                            <td>{{ $broker->phone }}</td>
                            <td>{{ $broker->city }}</td>
                            <td>{{ $broker->experience_years }} years</td>
                            <td>
                                <span class="badge bg-{{ $broker->is_active ? 'success' : 'danger' }}">
                                    {{ $broker->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('brokers.edit', $broker->id) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('brokers.destroy', $broker->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this broker?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No brokers found. Add your first broker!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.container-fluid {
    max-width: 1200px;
    margin: 0 auto;
}
.table th {
    background-color: #f8f9fa;
    font-weight: 600;
}
</style>
@endsection