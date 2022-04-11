<[[LAYOUT]]>
    <x-slot name="title">
        {{ __('users.header.page_title') }}
    </x-slot>

    <x-slot name="subtitle">
        <div class="text-muted mt-1">
            There {{ $total > 1 ? 'are' : 'is' }} {{ $total }} users on the system
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="col-auto ms-auto d-print-none">
            <div class="d-flex">
                <form action="{{ route('users.index') }}" method="get" class="me-2">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control d-inline-block w-9" value="{{ $search ?? '' }}" placeholder="Search...">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </form>

                <a href="{{ route('users.create') }}" class="btn btn-primary float-right">
                    <x-icons.plus class="me-1" />
                    {{ __('users.button.add_new') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container-xl">
        <div class="row row-cards">
            <x-status />
            <x-errors />

            @if ($users->count() < 1)
                <div class="card-body">
                    <x-no-result />
                </div>
            @else
                @foreach ($users as $user)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            @if (auth()->user()->id === $user->id)
                                <div class="card-status-top bg-danger"></div>
                                <div class="ribbon bg-red">YOU</div>
                            @endif
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url('{{ $user->getAvatarUrl() }}')"></span>
                                <h3 class="m-0 mb-1">
                                    <a href="{{ route('users.edit', $user) }}">
                                        {!! \App\Http\Helpers\StrHelper::highlight($search, $user->name) !!}
                                    </a>
                                </h3>
                            </div>
                            <div class="d-flex">
                                @if (auth()->user()->id === $user->id)
                                    <a href="{{ route('profile')  }}" class="card-btn text-danger">
                                        <x-icons.user-check class="me-2" />
                                        Profile
                                    </a>
                                @else
                                    <a href="{{ route('users.edit', $user) }}" class="card-btn text-info">
                                        <x-icons.edit class="me-2" />
                                        Edit
                                    </a>

                                    <a href="{{ route('users.delete', $user) }}" class="card-btn text-danger btn-delete-user">
                                        <x-icons.trash class="me-2" />
                                        Delete
                                    </a>
                                    <form action="{{ route('users.delete', $user) }}" method="post" id="user-delete-{{ $user->id }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex mt-4 justify-content-center">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>

    <x-slot name="js">
        <script>
            $(document).ready( function () {

                $('.btn-delete-user').click( function (e) {
                    e.preventDefault()

                    if (confirm('{{ __('Are you sure you want to delete this user?') }}')) {
                        let id = $(this).attr('data-id')

                        $('#user-delete-' + id).submit()
                    }
                })

            })
        </script>
    </x-slot>
</[[LAYOUT]]>
