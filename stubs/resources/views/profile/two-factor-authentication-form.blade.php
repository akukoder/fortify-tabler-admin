<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('profile.header.2fa') }}
        </h3>
    </div>
    <div class="card-body">
        @if(! auth()->user()->two_factor_secret)
            <div class="text-center">
                <div class="py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock w-5 h-5" width="128" height="128" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                        <circle cx="12" cy="16" r="1"></circle>
                        <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                    </svg>
                </div>
                <h2>{{ __('profile.header.2fa_not_enabled') }}</h2>
                <p>{{ __('profile.description.2fa_not_enabled') }}</p>
            </div>
            <form method="POST" action="{{ route('two-factor.enable') }}" class="text-center">
                @csrf

                <button type="submit" class="btn btn-success mb-3">
                    {{ __('profile.button.enable_2fa') }}
                </button>
            </form>
        @else
            {{-- Show 2FA Recovery Codes --}}
            <p class="mb-2">
                {{ __('profile.description.store_codes') }}
            </p>

            <ul class="list-group mb-3">
                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                    <li class="list-group-item">{{ $code }}</li>
                @endforeach
            </ul>

            {{-- Regenerate 2FA Recovery Codes --}}
            <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}" id="regenerateCodeForm">
                @csrf
            </form>

            {{-- Disable 2FA --}}
            <form method="POST" action="{{ route('two-factor.disable') }}" id="disable2fa">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div><!-- /.card-body -->
    @if (auth()->user()->two_factor_secret)
    <div class="card-footer text-end">
        <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('regenerateCodeForm').submit();">
            {{ __('profile.button.regenerate_codes') }}
        </button>

        <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('disable2fa').submit();">
            {{ __('profile.button.disable_2fa') }}
        </button>
    </div>
    @endif
</div><!-- /.card -->
