<x-layouts.dashboard>
    <x-page.container>
        <div class="col">
            <x-status />

            <div>You are logged in!</div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit">
                    {{ __('Logout') }}
                </button>
            </form>

            <hr>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                @include('profile.update-profile-information-form')
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                @include('profile.update-password-form')
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                @include('profile.two-factor-authentication-form')
            @endif
        </div>
    </x-page.container>
</x-layouts.dashboard>
