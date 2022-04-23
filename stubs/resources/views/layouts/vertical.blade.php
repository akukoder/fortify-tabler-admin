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

    <body class="antialiased d-flex flex-column {{ $theme }}">
        <div class="page">
            <x-sidebar />

            <div class="page-wrapper">
                <x-page-title
                    :title="$title ?? ''"
                    :pretitle="$pretitle ?? ''"
                    :actions="$actions ?? ''"
                    :subtitle="$subtitle ?? ''" />

                <div class="page-body">
                    {{ $slot }}
                </div>

                <x-footer />
            </div>

        </div>
        <x-scripts :js="$js ?? ''" />
    </body>
</html>
