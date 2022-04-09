<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('profile.header.update_password') }}
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">
                    {{ __('profile.label.current_password') }}
                </label>

                <input
                    type="password"
                    name="current_password"
                    class="form-control"
                    required
                    autocomplete="current-password">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    {{ __('profile.label.new_password') }}
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                    autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label>
                    {{ __('profile.label.confirm_new_password') }}
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required
                    autocomplete="new-password">
            </div>

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('profile.button.update_password') }}
                </button>
            </div>
        </form>
    </div><!-- /.card-body -->
</div><!-- /.card -->
