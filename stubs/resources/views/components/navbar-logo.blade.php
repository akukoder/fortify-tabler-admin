<a href="{{ route('dashboard') }}">
    <img
        src="{{ $light == 0 ? asset('/static/logo.svg') : asset('/static/logo-white.svg') }}"
        width="110"
        height="32"
        alt="{{ config('app.name', 'Laravel') }}"
        class="navbar-brand-image">
</a>
