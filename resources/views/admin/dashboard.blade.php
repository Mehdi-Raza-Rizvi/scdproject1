@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-dashboard">
    <div class="dashboard-header">
        <h1>Admin Dashboard</h1>
    </div>

    <div class="dashboard-grid">
        <!-- Brokers Management Card -->
        <a href="{{ route('brokers.admin') }}" class="dashboard-card">
            <div class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div class="card-content">
                <h3>Manage Brokers</h3>
                <p>Add, edit, or remove property brokers</p>
                <span class="card-link">Go to Brokers →</span>
            </div>
        </a>

        <!-- Website View Card -->
        <a href="{{ route('properties.admin') }}" target="_blank" class="dashboard-card">
            <div class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
            </div>
            <div class="card-content">
                <h3>View Property CRUD</h3>
                <p>Manage properties</p>
                <span class="card-link">Open Website →</span>
            </div>
        </a>
    </div>
</div>

<style>
.admin-dashboard {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

.dashboard-header {
    text-align: center;
    margin-bottom: 50px;
}

.dashboard-header h1 {
    font-size: 36px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.dashboard-header p {
    font-size: 18px;
    color: #666;
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 800px;
    margin: 0 auto;
}

.dashboard-card {
    background: white;
    border-radius: 12px;
    padding: 30px;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border: 2px solid transparent;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 20px;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    border-color: #667eea;
}

.dashboard-card:first-child:hover {
    border-color: #667eea;
}

.dashboard-card:last-child:hover {
    border-color: #10b981;
}

.card-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.dashboard-card:first-child .card-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.dashboard-card:last-child .card-icon {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.card-icon svg {
    color: white;
}

.card-content {
    flex: 1;
}

.card-content h3 {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.card-content p {
    color: #666;
    line-height: 1.5;
    margin-bottom: 12px;
}

.card-link {
    color: #667eea;
    font-weight: 500;
    font-size: 14px;
    display: inline-block;
    transition: transform 0.3s ease;
}

.dashboard-card:hover .card-link {
    transform: translateX(5px);
}

.dashboard-card:last-child .card-link {
    color: #10b981;
}

@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
        max-width: 400px;
    }
    
    .dashboard-header h1 {
        font-size: 28px;
    }
    
    .dashboard-header p {
        font-size: 16px;
    }
    
    .dashboard-card {
        padding: 25px;
    }
}

@media (max-width: 480px) {
    .admin-dashboard {
        padding: 30px 15px;
    }
    
    .dashboard-card {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
}
</style>
@endsection