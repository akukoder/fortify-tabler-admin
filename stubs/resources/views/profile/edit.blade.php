<x-layouts.horizontal>
    <x-slot name="page_pretitle">
        {{ __('profile.header.page_pretitle') }}
    </x-slot>

    <x-slot name="page_title">
        {{ __('profile.header.page_title') }}
    </x-slot>

    <x-container>
        <div class="col">
            <x-status />
            <div class="content">
                <div class="row row-cards">
                    <div class="col-12">

                        @if (session('status') === 'two-factor-authentication-enabled')
                            {{-- Show SVG QR Code, After Enabling 2FA --}}
                            <div class="alert alert-success" id="enable2fa">
                                <p class="mb-2">
                                    {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                                </p>
                                <div>{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>
                            </div>
                            <style>
                                #enable2fa svg {
                                    border: 10px solid #fff;
                                }
                            </style>
                        @endif

                        @include('profile.update-user-avatar')

                        @include('profile.update-profile-information-form')

                        @include('profile.update-password-form')

                        @include('profile.browser-sessions')

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                            @include('profile.two-factor-authentication-form')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-layouts.horizontal>
