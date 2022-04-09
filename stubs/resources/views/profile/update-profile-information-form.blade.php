<form method="POST" action="{{ route('user-profile-information.update') }}">
    @csrf
    @method('PUT')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('profile.header.update_profile') }}
            </h3>
        </div>
        <div class="card-body">
            <div class="form-floating mb-3">
                <input
                    type="text"
                    name="name"
                    id="form-name"
                    class="form-control"
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                    autofocus
                    autocomplete="name"
                >
                <label for="form-name">{{ __('profile.label.name') }}</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="email"
                    name="email"
                    id="form-email"
                    class="form-control"
                    value="{{ old('email', auth()->user()->email) }}"
                    required
                    >
                <label for="form-email">{{ __('profile.label.email') }}</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    name="username"
                    id="form-username"
                    class="form-control"
                    value="{{ old('username', auth()->user()->username) }}"
                    required
                    >
                <label for="form-username">{{ __('profile.label.username') }}</label>
            </div>
        </div><!-- /.card-body -->
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">
                {{ __('profile.button.update_profile') }}
            </button>
        </div>
    </div><!-- /.card -->
</form>
