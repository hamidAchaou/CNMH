<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{__('words.navbar_home')}}</p>
    </a>
</li>

{{-- projects --}}
<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::routeIs('projects.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>{{__('words.projects')}}</p>
    </a>
</li>


{{-- tasks --}}
<li class="nav-item">
    <a href="{{ route('getTasksByProject', ['id' => 1]) }}" class="nav-link {{ Request::routeIs('getTasksByProject') || Request::routeIs('tasks.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tasks"></i>
        <p>{{__('words.Tasks')}}</p>
    </a>
</li>

{{-- members --}}
<li class="nav-item">
    <a href="{{ route('members.index') }}" class="nav-link {{ Request::routeIs('members.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>{{__('words.members_title')}}</p>
    </a>
</li>
