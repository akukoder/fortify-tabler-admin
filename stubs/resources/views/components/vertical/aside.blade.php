<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <x-navbar-logo-white />
        </h1>
        <div class="navbar-nav flex-column flex-grow-0">
            <x-navbar-item-user class="my-3" />
{{--            <x-nav-item-utils />--}}
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <x-navbar-menu-items />
        </div>
    </div>
</aside>
