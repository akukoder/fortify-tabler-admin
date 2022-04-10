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
