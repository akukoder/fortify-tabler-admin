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

    <body class="antialiased d-flex flex-column {{ auth()->user()->settings('user_theme', 'theme-dark') }}">
        <div class="page">

            <div class="page-wrapper">
                <x-overlap.header />

                @if (isset($page_pretitle) OR isset($page_title) OR isset($page_title_actions))
                    <div class="container-xl">
                        <!-- Page title -->
                        <div class="page-header text-white d-print-none">
                            <div class="row align-items-center">
                                <div class="col">
                                    @if (isset($page_pretitle))
                                        <div class="page-pretitle text-white-50">
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
                        </div><!-- /.page-header -->
                    </div><!-- /.container-xl -->
                @endif

                <div class="page-body">
                    {{ $slot }}
                </div><!-- /.page-body -->

                <x-footer />
            </div><!-- /.page-wrapper -->
        </div><!-- /.page -->
        <x-scripts :js="$js" />
    </body>
</html>
