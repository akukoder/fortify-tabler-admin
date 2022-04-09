<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('profile.header.active_session') }}
        </h3>
    </div>

    <div class="card-table table-responsive">
        <table class="table table-vcenter datatable">
            <thead>
            <tr>
                <th>{{ __('profile.table.user_agent') }}</th>
                <th>{{ __('profile.table.ip_address') }}</th>
                <th>{{ __('profile.table.last_activity') }}</th>
                <th class="w-1"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($devices as $device)
                <tr>
                    <td>{{ $device->user_agent }}</td>
                    <td>
                        {{ $device->ip_address }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::createFromTimestamp($device->last_activity)->locale(str_replace('_', '-', app()->getLocale()))->diffForHumans() }}
                    </td>
                    <td>
                        @if(session()->getId() === $device->id)
                            <span class="badge bg-info">{{ __('profile.button.current_device') }}</span>
                        @else
                            <form action="{{ route('profile.deletedevice', ['id' => $device->id]) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ __('profile.button.remove_device') }}
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.card-table -->
</div><!-- /.card -->
