<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

        {{ $css ?? '' }}

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body class="antialiased d-flex flex-column">
        <div class="page">
            <x-page.header />

            <x-page.navbar />

            <div class="page-wrapper">
                @if (isset($page_pretitle) OR isset($page_title) OR isset($page_title_actions))
                    <div class="container-xl">
                        <!-- Page title -->
                        <div class="page-header d-print-none">
                            <div class="row align-items-center">
                                <div class="col">
                                    @if (isset($page_pretitle))
                                        <div class="page-pretitle">
                                            {{ $page_pretitle ?? 'Overview' }}
                                        </div>
                                    @endif

                                    @if (isset($page_title))
                                        <h2 class="page-title">
                                            {{ $page_title ?? 'Dashboard' }}
                                        </h2>
                                    @endif
                                </div>

                                {{ $page_title_actions ?? '' }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="page-body">
                    {{ $slot }}
                </div>

                <x-page.footer />
            </div>

        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        {{ $js ?? '' }}
    </body>
</html>
