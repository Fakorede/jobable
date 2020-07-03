<!DOCTYPE html>
<html lang="en">
<head>
    @include('../partials._header')
</head>
<body>
    <header id="home" class="hero-area">
        @include('partials._nav')
    </header>

    @yield('page-header')
    
    @yield('content')

    @include('../partials._footer')
</body>
</html>