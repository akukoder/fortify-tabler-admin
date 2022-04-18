@if ($overlap == 1)
    <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <x-navbar-logo light="1" />
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <x-navbar-item-user />
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <x-navbar-menu-items />
                </div>
            </div>
        </div>
    </header>
@elseif ($overlap == 0 and $vheader == 1)
    <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none header-vertical">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu-search">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
                <x-navbar-item-user />
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu-search">
                <div>
                    <form action="." method="get">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                                </span>
                            <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
@else
    @if ($sticky == 1)
        <div class="sticky-top">
    @endif

    @if ($combine == 0)
        <header class="navbar navbar-expand-md {{ $sticky == 1 ? 'sticky-top' : '' }} navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <x-navbar-logo light="1" />
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <x-navbar-item-user />
                </div>
            </div>
        </header>

        <div class="navbar-expand-md">
            <x-navbar-menu />
        </div>
    @else
        <header class="navbar navbar-expand-md {{ $sticky == 1 ? 'sticky-top' : '' }} navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <x-navbar-logo light="1" />
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <x-navbar-item-user />
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <x-navbar-menu-items />
                    </div>
                </div>
            </div>
        </header>
    @endif

    @if ($sticky == 1)
        </div> <!-- /.sticky-top-->
    @endif
@endif
