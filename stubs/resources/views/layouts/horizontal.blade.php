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
            <x-header combine="1" sticky="1" overlap="0" vheader="0" />

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
