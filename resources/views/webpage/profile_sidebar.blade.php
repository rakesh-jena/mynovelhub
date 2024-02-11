<div class="sidebar text-capitalize profile-sidebar d-none">
    <nav class="sidebar-offcanvas profile-sidebar" id="sidebar-profile">
        <ul class="nav">
            <li class="nav-item {{ Request::is('profile*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ URL('profile') }}">
                    <span class="menu-title">Profile</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('library*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ URL('library') }}">
                    <span class="menu-title">Library</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('activity*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ URL('activity') }}">
                    <span class="menu-title">activity</span>
                    <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('reading-history*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ URL('reading-history') }}">
                    <span class="menu-title">History</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>