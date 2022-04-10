<[[LAYOUT]]>

    <x-container>
        <x-errors />
        <div class="col">
            <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        {{ __('User Information') }}
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-3">{{ __('Profile Picture') }}</label>
                            <div class="col-md-7">
                                <input
                                    type="file"
                                    name="avatar"
                                    class="form-control @error('avatar') is-invalid @enderror"
                                    accept=".png,.jpg,.jpeg,.gif,.webp">

                                @error('avatar')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @if (! empty($user->avatar))
                                <div class="col-md-4 offset-md-3">
                                    <div class="text-danger mt-3">
                                        <em>
                                            {{ __('Uploading new picture will delete the old one automatically.') }}
                                        </em>
                                    </div>
                                    <img
                                        src="{{ (new App\Actions\UserAvatar)->get($user) }}"
                                        class="img-fluid w-50 mt-2">

                                    <div class="text-danger mt-1">
                                        <a
                                            href="{{ route('users.delete-avatar', $user) }}"
                                            class="btn btn-danger">
                                            {{ __('Delete Profile Picture') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div><!-- /.form-group -->

                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-3">{{ __('Name') }}</label>
                            <div class="col-md-7">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                    autofocus>

                                @error('name')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-3">{{ __('Email') }}</label>
                            <div class="col-md-7">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}"
                                    required>

                                @error('email')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-3">{{ __('Username') }}</label>
                            <div class="col-md-7">
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username', $user->username) }}"
                                    required>

                                @error('username')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-3">{{ __('Password') }}</label>
                            <div class="col-md-3">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                >

                                @error('password')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group row mb-3">
                            <label class="col-form-label col-md-3">{{ __('Confirm Password') }}</label>
                            <div class="col-md-3">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                >

                                @error('password_confirmation')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div><!-- /.form-group -->

                    </div><!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary float-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <line x1="5" y1="12" x2="11" y2="18"></line>
                                        <line x1="5" y1="12" x2="11" y2="6"></line>
                                    </svg>
                                    {{ __('Cancel') }}
                                </a>
                            </div>

                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                    </svg>
                                    {{ __('Update User') }}
                                </button>
                            </div>
                        </div>
                    </div><!-- /.card-footer -->
                </div><!-- /.card -->
            </form>
        </div>
    </x-container>
</[[LAYOUT]]>
