<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._header')
</head>
<body>

<!-- header -->
<header id="home" class="hero-area">
    @include('partials._nav')
    @include('partials._carousel')
</header>

<!-- categories -->
@include('partials._category')


<!-- companies -->
@include('partials._companies')


<!-- Browse Jobs -->
@include('partials._browse')

<!-- How It Works -->
@include('partials._how')

<!-- latest jobs -->
@include('partials._latest')


<!-- testimonial -->
@include('partials._testimonial')

<!-- counter -->
@include('partials._counter')

<!-- blog -->
@include('partials._blog')

<!-- download -->
@include('partials._download')

<!-- footer -->
@include('partials._footer')

</body>
</html>