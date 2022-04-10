<ul class="navbar-nav">
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
            </span>
            <span class="nav-link-title">
                Home
            </span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
            </span>
            <span class="nav-link-title">
                Interface
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="./empty.html" >
                        Empty page
                    </a>
                    <a class="dropdown-item" href="./accordion.html" >
                        Accordion
                    </a>
                    <a class="dropdown-item" href="./blank.html" >
                        Blank page
                    </a>
                    <a class="dropdown-item" href="./buttons.html" >
                        Buttons
                    </a>
                    <a class="dropdown-item" href="./cards.html" >
                        Cards
                    </a>
                    <a class="dropdown-item" href="./cards-masonry.html" >
                        Cards Masonry
                    </a>
                    <a class="dropdown-item" href="./colors.html" >
                        Colors
                    </a>
                    <a class="dropdown-item" href="./dropdowns.html" >
                        Dropdowns
                    </a>
                    <a class="dropdown-item" href="./icons.html" >
                        Icons
                    </a>
                    <a class="dropdown-item" href="./modals.html" >
                        Modals
                    </a>
                    <a class="dropdown-item" href="./maps.html" >
                        Maps
                    </a>
                    <a class="dropdown-item" href="./map-fullsize.html" >
                        Map fullsize
                    </a>
                    <a class="dropdown-item" href="./maps-vector.html" >
                        Vector maps
                    </a>
                </div>
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="./navigation.html" >
                        Navigation
                    </a>
                    <a class="dropdown-item" href="./charts.html" >
                        Charts
                    </a>
                    <a class="dropdown-item" href="./pagination.html" >
                        Pagination
                    </a>
                    <a class="dropdown-item" href="./skeleton.html" >
                        Skeleton
                    </a>
                    <a class="dropdown-item" href="./tabs.html" >
                        Tabs
                    </a>
                    <a class="dropdown-item" href="./tables.html" >
                        Tables
                    </a>
                    <a class="dropdown-item" href="./carousel.html" >
                        Carousel
                    </a>
                    <a class="dropdown-item" href="./lists.html" >
                        Lists
                    </a>
                    <a class="dropdown-item" href="./typography.html" >
                        Typography
                    </a>
                    <a class="dropdown-item" href="./markdown.html" >
                        Markdown
                    </a>
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                            Authentication
                        </a>
                        <div class="dropdown-menu">
                            <a href="./sign-in.html" class="dropdown-item">Sign in</a>
                            <a href="./sign-up.html" class="dropdown-item">Sign up</a>
                            <a href="./forgot-password.html" class="dropdown-item">Forgot password</a>
                            <a href="./terms-of-service.html" class="dropdown-item">Terms of service</a>
                            <a href="./auth-lock.html" class="dropdown-item">Lock screen</a>
                        </div>
                    </div>
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                            Error pages
                        </a>
                        <div class="dropdown-menu">
                            <a href="./error-404.html" class="dropdown-item">404 page</a>
                            <a href="./error-500.html" class="dropdown-item">500 page</a>
                            <a href="./error-maintenance.html" class="dropdown-item">Maintenance page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./form-elements.html" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                                    </span>
            <span class="nav-link-title">
                                        Form elements
                                    </span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                    </span>
            <span class="nav-link-title">
                                        Extra
                                    </span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="./activity.html" >
                Activity
            </a>
            <a class="dropdown-item" href="./gallery.html" >
                Gallery
            </a>
            <a class="dropdown-item" href="./invoice.html" >
                Invoice
            </a>
            <a class="dropdown-item" href="./search-results.html" >
                Search results
            </a>
            <a class="dropdown-item" href="./pricing.html" >
                Pricing cards
            </a>
            <a class="dropdown-item" href="./users.html" >
                Users
            </a>
            <a class="dropdown-item" href="./license.html" >
                License
            </a>
            <a class="dropdown-item" href="./music.html" >
                Music
            </a>
            <a class="dropdown-item" href="./widgets.html" >
                Widgets
            </a>
            <a class="dropdown-item" href="./wizard.html" >
                Wizard
            </a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="5" rx="2" /><rect x="4" y="13" width="6" height="7" rx="2" /><rect x="14" y="4" width="6" height="7" rx="2" /><rect x="14" y="15" width="6" height="5" rx="2" /></svg>
                                    </span>
            <span class="nav-link-title">
                                        Layout
                                    </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="./layout-horizontal.html" >
                        Horizontal
                    </a>
                    <a class="dropdown-item" href="./layout-vertical.html" >
                        Vertical
                    </a>
                    <a class="dropdown-item" href="./layout-vertical-transparent.html" >
                        Vertical transparent
                    </a>
                    <a class="dropdown-item" href="./layout-vertical-right.html" >
                        Right vertical
                    </a>
                    <a class="dropdown-item" href="./layout-condensed.html" >
                        Condensed
                    </a>
                    <a class="dropdown-item" href="./layout-condensed-dark.html" >
                        Condensed dark
                    </a>
                    <a class="dropdown-item" href="./layout-combo.html" >
                        Combined
                    </a>
                </div>
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="./layout-navbar-dark.html" >
                        Navbar dark
                    </a>
                    <a class="dropdown-item" href="./layout-navbar-sticky.html" >
                        Navbar sticky
                    </a>
                    <a class="dropdown-item" href="./layout-navbar-overlap.html" >
                        Navbar overlap
                    </a>
                    <a class="dropdown-item" href="./layout-dark.html" >
                        Dark mode
                    </a>
                    <a class="dropdown-item" href="./layout-rtl.html" >
                        RTL mode
                    </a>
                    <a class="dropdown-item" href="./layout-fluid.html" >
                        Fluid
                    </a>
                    <a class="dropdown-item" href="./layout-fluid-vertical.html" >
                        Fluid vertical
                    </a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <circle cx="9" cy="7" r="4"></circle>
                   <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                   <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                   <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                </svg>
            </span>
            <span class="nav-link-title">
                Users
            </span>
        </a>
    </li>
</ul>
