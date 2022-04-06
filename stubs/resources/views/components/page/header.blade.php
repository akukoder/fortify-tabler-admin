<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('dashboard') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
            <img src="{{ asset('/static/logo.svg') }}" height="32" alt="{{ config('app.name', 'Laravel') }}"
                 class="navbar-brand-image" id="logo">
        </a>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                  style="background-image: url(@if (Auth::user()->avatar) {{ asset('storage/avatars/'.Auth::user()->avatar) }} @else https://api.proxeuse.com/avatars/api/?name={{ urlencode(Auth::user()->name) }}&color=fff&background={{ substr(md5(Auth::user()->name), 0, 6) }} @endif)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="{{ url('profile') }}"
                       class="dropdown-item">Profile Settings</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
