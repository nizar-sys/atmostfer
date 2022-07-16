@php
$routeActive = Route::currentRouteName();
$userRole = Auth::user()?->role;
@endphp

<li><a class="{{ $routeActive == 'landing.home' ? 'active' : '' }}" href="{{ route('landing.home') }}" href="/">Home</a></li>
<li><a class="{{ $routeActive == 'landing.shop' ? 'active' : '' }}" href="{{ route('landing.shop') }}">Shop</a></li>
<li><a class="{{ $routeActive == 'landing.home' ? 'active' : '' }}" href="{{ route('landing.home') }}">Blog</a></li>
<li><a class="{{ $routeActive == 'landing.home' ? 'active' : '' }}" href="{{ route('landing.home') }}">About</a></li>
<li><a class="{{ $routeActive == 'landing.home' ? 'active' : '' }}" href="{{ route('landing.home') }}">Contact</a></li>
<li id="lg-bag"><a clas="{{ $routeActive == 'landing.home' ? 'active' : '' }}" href="{{ route('landing.home') }}"><i
            class="fa fa-shopping-bag"></i></a></li>
<a href="#" id="close"><i class="fa fa-times"></i></a>
