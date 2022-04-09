<form method="POST" action="{{ route('user-password.update') }}">
    @csrf
    @method('PUT')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('profile.header.update_password') }}
            </h3>
        </div>
        <div class="card-body">
            <div class="form-floating mb-3">
                <input
                    type="password"
                    name="current_password"
                    id="form-current_password"
                    class="form-control"
                    required
                    autocomplete="current-password">
                <label for="form-current_password">{{ __('profile.label.current_password') }}</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    name="password"
                    id="form-password"
                    class="form-control"
                    required
                    autocomplete="new-password">
                <label for="form-password">{{ __('profile.label.new_password') }}</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    name="password_confirmation"
                    id="form-password_confirmation"
                    class="form-control"
                    required
                    autocomplete="new-password">
                <label for="form-password_confirmation">{{ __('profile.label.confirm_new_password') }}</label>
            </div>
        </div><!-- /.card-body -->
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">
                {{ __('profile.button.update_password') }}
            </button>
        </div>
    </div><!-- /.card -->
</form>
