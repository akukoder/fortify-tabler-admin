@if (session('status'))
    @switch (session('status'))
        @case('two-factor-authentication-disabled')
            @break
        @case('two-factor-authentication-enabled')
            @break
        @case('profile-information-updated')
            <div class="alert alert-info">{{ __('Profile information updated!') }}</div>
            @break
        @default
            <div class="alert alert-info">{{ session('status') }}</div>
    @endswitch
@endif
