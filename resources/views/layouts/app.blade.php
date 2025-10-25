<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real Estate Website</title>

       <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-pages.css') }}">
    
</head>
<body>

@include('partials.header')

<div class="content">
    @yield('content')
</div>

@include('partials.footer')

</body>
</html>
