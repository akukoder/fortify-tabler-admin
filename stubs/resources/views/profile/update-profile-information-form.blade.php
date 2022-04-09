<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('profile.header.update_profile') }}
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') ?? auth()->user()->name }}" required autofocus
                       autocomplete="name" />
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') ?? auth()->user()->email }}" required autofocus />
            </div>

            <div>
                <button type="submit" class="btn btn-primary">
                    Update Profile
                </button>
            </div>
        </form>

    </div><!-- /.card-body -->
</div><!-- /.card -->
