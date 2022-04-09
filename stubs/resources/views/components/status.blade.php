@if (session('status'))
    @switch (session('status'))
        @case('two-factor-authentication-disabled')
            @break
        @case('two-factor-authentication-enabled')
            @break
        @default
            <div>{{ session('status') }}</div>
    @endswitch
@endif
