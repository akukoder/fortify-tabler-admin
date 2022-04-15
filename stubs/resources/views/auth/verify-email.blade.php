<x-layouts.auth>
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            {{ __('auth.resend_confirmation') }}
        </div>
    @endif

    <div class="card card-md">
        <div class="card-body">
            <h2 class="text-center">{{ __('auth.email_verification') }}</h2>
            <p class="text-center mx-2">
                {{ __('auth.email_verification_text') }}
            </p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="">
                    <button type="submit" class="btn btn-primary w-100" tabindex="2">{{ __('auth.resend') }}</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.auth>
