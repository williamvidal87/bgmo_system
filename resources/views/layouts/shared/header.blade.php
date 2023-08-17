{{-- <header id="navbar">
  <div id="navbar-container" class="boxed">
    <div class="navbar-header">
      <a href="dashboard" class="navbar-brand">
        <img src="img/norsulogo.png" alt="Nifty Logo" class="brand-icon">
        <div class="brand-title">
          <span class="brand-text">NORSU-G IGP</span>
        </div>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="nav navbar-top-links">
        <li class="tgl-menu-btn">
          <a class="mainnav-toggle" href="#">
            <i class="demo-pli-list-view"></i>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-top-links">
        <li id="dropdown-user" class="dropdown">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
            <span class="ic-user pull-right">
              <i class="demo-pli-male"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
            <ul class="head-list">
              <li>
                <a href="editprofileform"><i class="demo-pli-male icon-lg icon-fw"></i>Edit Profile</a>
              </li>
              <li>
                <a href="passwordupdate"><i class="demo-pli-gear icon-lg icon-fw"></i> Update Password</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <a href="{{ route('logout') }}"
                  @click.prevent="$root.submit();">
                    <i class="demo-pli-unlock icon-lg icon-fw"></i> {{ __('Log Out') }}
                  </a>
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header> --}}





<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="/"><img src="image/logo/bgmo_logo.gif" alt="logo" style="height: auto;width:auto"/></a>
    <a class="navbar-brand brand-logo-mini" href="/"><img src="image/logo/bgmo_mini.gif" alt="logo" style="height: auto"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="editprofileform">
            <i class="mdi mdi-account me-2 text-secondary"></i> Edit Profile </a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="passwordupdate">
            <i class="mdi mdi-key-variant me-2 text-warning"></i> Change Password </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}" @click.prevent="$root.submit();">
              <i class="mdi mdi-logout me-2 text-primary"></i> {{ __('Signout') }}
            </a>
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>