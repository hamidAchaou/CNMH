<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>Gestion Projects</p>
    </a>
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
