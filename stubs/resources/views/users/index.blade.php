<x-layouts.dashboard>
    <x-slot name="page_pretitle">
        {{ __('users.header.page_pretitle') }}
    </x-slot>

    <x-slot name="page_title">
        {{ __('users.header.page_title') }}
    </x-slot>

    <x-slot name="page_title_actions">
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('users.create') }}" class="btn btn-primary float-right">
                    <i class="fa fa-plus-square"></i> {{ __('users.button.add_new') }}
                </a>
            </div>
        </div>
    </x-slot>

    <x-page.container>
        <div class="col">
            <x-status />
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-around">
                        <div class="col">
                            <form action="{{ route('users.index') }}" method="get">
                                @csrf

                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <input
                                            type="search"
                                            name="search"
                                            class="form-control"
                                            placeholder="{{ __('Enter keyword...') }}"
                                            value="{{ $search ?? '' }}">

                                        <button
                                            type="submit"
                                            class="btn btn-outline-success">
                                            {{ __('Search') }}
                                        </button>
                                        <a
                                            href="{{ route('users.index') }}"
                                            class="btn btn-outline-secondary">
                                            {{ __('Reset') }}
                                        </a>
                                    </div>
                                </div><!-- /.form-group -->
                            </form>
                        </div>
                    </div>

                </div><!-- /.card-body -->

                @if ($users->count() < 1)
                    <div class="card-body">
                        <x-no-result />
                    </div>
                @else
                    <div class="card-table table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px;"></th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Username') }}</th>
                                <th style="width: 120px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ $user->getAvatarUrl() }}" class="img-fluid">
                                    </td>
                                    <td>
                                        {!! \App\Http\Helpers\StrHelper::highlight($search, $user->name) !!}
                                        @if (auth()->user()->id === $user->id)
                                            <em class="small badge bg-danger ms-2">{{ __('Your Account') }}</em>
                                        @endif
                                    </td>
                                    <td>{!! \App\Http\Helpers\StrHelper::highlight($search, $user->email) !!}</td>
                                    <td>{!! \App\Http\Helpers\StrHelper::highlight($search, $user->username) !!}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                            </svg>
                                        </a>

                                        @if (auth()->user()->id !== $user->id)
                                            <a href="{{ route('users.delete', $user) }}" data-id="{{ $user->id }}" class="btn btn-sm btn-outline-danger btn-delete-user">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('users.delete', $user) }}" method="post" id="user-delete-{{ $user->id }}" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @if ($users->hasPages())
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        {{ $users->links() }}
                                    </td>
                                </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                @endif
            </div><!-- /.card -->


        </div>
    </x-page.container>

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
</x-layouts.dashboard>
