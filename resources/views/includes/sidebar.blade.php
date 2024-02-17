
@php
    $currentRoute = Route::currentRouteName();
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">


    <!-- Nodal Users Sidebar Menus -->
    @if(auth()->user()->hasRole('user'))

      <li class="nav-item {{ $currentRoute == 'user.dashboard' ? 'active' : '' }}  ">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">User Dashboard</span>
        </a>
      </li>

      <li class="nav-item {{ $currentRoute == 'user.complaints' ? 'active' : '' }} 
        {{ $currentRoute == 'user.complaint.edit' ? 'active' : '' }}
        {{ $currentRoute == 'user.complaint.create' ? 'active' : '' }}
        {{ $currentRoute == 'user.complaint.view' ? 'active' : '' }} "
        >
        <a class="nav-link" href="{{ route('user.complaints') }}">
          <i class="icon-grid menu-icon"></i>
            <span class="menu-title">User Complaints List</span>
        </a>
      </li>

      <li class="nav-item {{ $currentRoute == 'profile.edit' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">User Profile</span>
        </a>
      </li>
      
    @endif

    

    <!-- Nodal Nodal Sidebar Menus -->
    @if(auth()->user()->hasRole('nodal'))

      <li class="nav-item  {{ $currentRoute == 'nodal.dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('nodal.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Nodal Dashboard</span>
        </a>
      </li>

      <li class="nav-item  {{ $currentRoute == 'nodal.complaints' ? 'active' : '' }} {{ $currentRoute == 'nodal.complaint.edit' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('nodal.complaints') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Nodal Complaints List</span>
        </a>
      </li>

    @endif



    <!-- Nodal FCO Sidebar Menus -->
    @if(auth()->user()->hasRole('fco'))

      <li class="nav-item {{ $currentRoute == 'fco.dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('fco.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">FCO Dashboard</span>
        </a>
      </li>

      <li class="nav-item  {{ $currentRoute == 'fco.complaints' ? 'active' : '' }} {{ $currentRoute == 'fco.complaint.edit' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('fco.complaints') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">FCO Complaints List</span>
        </a>
      </li>

    @endif
    
  </ul>
</nav>