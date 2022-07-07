@php
    $routeActive = Route::currentRouteName();
    $userRole = Auth::user()->role;
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
@if ($userRole == 'admin')
    
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Users</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'merks.index' ? 'active' : '' }}" href="{{ route('merks.index') }}">
        <i class="fas fa-book text-primary"></i>
        <span class="nav-link-text">Merks</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'products.index' ? 'active' : '' }}" href="{{ route('products.index') }}">
        <i class="fas fa-book text-default"></i>
        <span class="nav-link-text">Products</span>
    </a>
</li>
@endif
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
        <i class="fas fa-user-tie text-success"></i>
        <span class="nav-link-text">Profile</span>
    </a>
</li>