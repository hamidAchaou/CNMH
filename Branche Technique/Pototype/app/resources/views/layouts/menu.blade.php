<!-- Home -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('words.navbar_home') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>{{ __('words.projects_management') }}</p>
    </a>
</li>

{{-- tasks --}}
<li class="nav-item menu-open">
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('getTasksByProject') }}" class="nav-link {{ Request::is('getTasksByProject') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>{{ __('words.project_tasks') }}</p>
            </a>            
        </li>
    </ul>
</li>

    {{-- links member --}}
{{-- @can('create', App\Models\Member::class) --}}
<li class="nav-item menu-open">
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('members.index') }}" class="nav-link {{ Request::is('members.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>{{ __('words.sidebar_members') }}</p>
            </a>
        </li>
    </ul>
</li>
{{-- @endcan --}}
