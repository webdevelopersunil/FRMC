@php
    $currentRoute = Route::currentRouteName();
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">

    <!-- User -->
    <li class="nav-item" style="pointer-events: none;" >
      <a class="nav-link" href="" >
        <span class="menu-title">User</span>
      </a>
    </li>
    
    <li class="nav-item active">
      <a class="nav-link" href="">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

  </ul>
</nav>
