<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      {{-- <img src="dest/img/avatar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8"> --}}
      <span class="brand-text font-weight-light text-center">Projects</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('projects.index')}}" class="nav-link {{ isset($projects) ? 'active' : '' }}">
                  <i class="fas fa-chart-bar"></i>
                  <p>
                    Les projets
                  </p>
                </a>
              </li>
            </ul>
          </li>
          {{-- links tasks --}}
          <li class="nav-item">
            <a href="{{route('tasks.index')}}" class="nav-link {{ isset($tasks ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Gestion des Taches
              </p>
            </a>
          </li>
        </ul>
      </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>