<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="/" class="nav-link">
        <div class="nav-profile-image">
          <img src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}" alt="Profile Picture">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">{{ Auth::user()->getRule->rule_name }}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    
    <!-- for admin nav -->
    @if(Auth::user()->rule_id==1)
      @include('layouts.shared.main_navs.admin_nav')
    @endif
    
    <!-- for client nav -->
    @if(Auth::user()->rule_id==2)
      @include('layouts.shared.main_navs.client_nav')
    @endif
    
  </ul>
</nav>