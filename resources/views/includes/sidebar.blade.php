
@php
    $currentRoute = Route::currentRouteName();
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">
    
    <li class="nav-item {{ $currentRoute == 'dashboard' ? 'active' : '' }} ">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item  ">
      <a class="nav-link" href="{{ route('nodal.complaints') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Complaints List</span>
      </a>
    </li>

  </ul>
</nav>