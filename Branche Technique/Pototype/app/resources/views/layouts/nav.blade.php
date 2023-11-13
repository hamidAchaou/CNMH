<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('projects.index')}}" class="nav-link">{{ __('words.navbar_home') }}</a>
      </li>

      
      {{-- <li>
          <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
              {{ $properties['native'] }}
          </a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fa-solid fa-language"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-0" style="left: inherit; right: 0px;">
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a class="dropdown-item {{ ($localeCode == LaravelLocalization::getCurrentLocale()) ? 'active' : '' }}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  {{ $properties['native'] }}
              </a>
          @endforeach
      </div>
      
    </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>