@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('auth.error') }}: {{ $errors->first() }}
    </div>
@endif
