<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real Estate Website</title>
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
