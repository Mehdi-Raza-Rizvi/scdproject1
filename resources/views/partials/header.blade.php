<header>
    <nav class="navbar">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('rent') }}">Rent Property</a>
        <a href="{{ route('sell') }}">Sell Property</a>
        <a href="{{ route('appointment') }}">Appointments</a>

        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @endguest
    </nav>
</header>
