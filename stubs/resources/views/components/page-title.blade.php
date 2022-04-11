@if (isset($pretitle) OR isset($title) OR isset($actions) OR isset($subtitle))
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    @if (! empty($pretitle))
                        <div class="page-pretitle">
                            {{ $pretitle ?? 'Overview' }}
                        </div>
                    @endif

                    @if (! empty($title))
                        <h2 class="page-title">
                            {{ $title ?? 'Dashboard' }}
                        </h2>
                    @endif

                    @if (! empty($subtitle))
                        {{ $subtitle ?? '' }}
                    @endif
                </div>

                {{ $actions ?? '' }}
            </div>
        </div>
    </div>
@endif
