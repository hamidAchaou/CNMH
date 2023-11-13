<aside class="main-sidebar sidebar-dark-primary elevation-4 box-solid">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link">
      <img src="{{ asset("dist/img/logo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('words.brand_text') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset("dist/img/user.png")}}" class="img-circle elevation-2" alt="{{ __('words.user_image_alt') }}">
          </div>
          <div class="info">
              <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item menu-open">
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('projects.index')}}" class="nav-link {{ Request::is('projects*') ? 'active' : '' }}">
                              <i class="{{ __('words.chart_bar_icon') }}"></i>
                              <p>{{ __('words.sidebar_projects') }}</p>
                          </a>
                      </li>
                  </ul>
              </li>
              @if(auth()->check() && auth()->user()->role == 'chefProjet')
              <li class="nav-item menu-open">
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('members.index') }}" class="nav-link {{ Request::is('members*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-users"></i>
                              <p>{{ __('words.sidebar_members') }}</p>
                          </a>
                      </li>
                  </ul>
              </li>
              @endif

              <!-- Logout Button -->
              <li class="nav-item text-center mt-5 d-flex justify-content-center">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link btn btn-danger">
                      <i class="{{ __('words.logout_icon') }}"></i>
                      <p>{{ __('words.logout') }}</p>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
          </ul>
      </nav>
  </div>
  <!-- /.sidebar -->
</aside>
