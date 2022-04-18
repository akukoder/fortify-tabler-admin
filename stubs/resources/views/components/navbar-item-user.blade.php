<div class="nav-item dropdown {{ $class ?? '' }}">

    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu" aria-expanded="false">
        <span
            class="avatar avatar-sm"
            style="background-image: url('{{ auth()->user()->getAvatarUrl() }}')">
        </span>
        <div class="d-none d-xl-block ps-2">
            <div>{{ auth()->user()->name }}</div>
            {{--<div class="mt-1 small text-muted">UI Designer</div>--}}
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-{{ $position ?? 'end' }} dropdown-menu-arrow {{ auth()->user()->settings('user_theme', 'theme-dark') === 'theme-dark' ? 'text-light' : '' }}">
        <a href="{{ route('profile') }}" class="dropdown-item">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check pe-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 11l2 2l4 -4"></path>
            </svg>
            Profile &amp; Account
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('profile.theme') }}?theme=dark" class="dropdown-item hide-theme-dark" title="" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Enable dark mode">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon pe-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
            </svg>
            Enable Dark Mode
        </a>
        <a href="{{ route('profile.theme') }}?theme=light" class="dropdown-item hide-theme-light" title="" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Enable light mode">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brightness-down pe-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="3"></circle>
                <line x1="12" y1="5" x2="12" y2="5.01"></line>
                <line x1="17" y1="7" x2="17" y2="7.01"></line>
                <line x1="19" y1="12" x2="19" y2="12.01"></line>
                <line x1="17" y1="17" x2="17" y2="17.01"></line>
                <line x1="12" y1="19" x2="12" y2="19.01"></line>
                <line x1="7" y1="17" x2="7" y2="17.01"></line>
                <line x1="5" y1="12" x2="5" y2="12.01"></line>
                <line x1="7" y1="7" x2="7" y2="7.01"></line>
            </svg>
            Enable Light Mode
        </a>

        <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock pe-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                <circle cx="12" cy="16" r="1"></circle>
                <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
            </svg>
            Logout
        </a>
    </div>

    <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form">
        @csrf
    </form>
</div>
