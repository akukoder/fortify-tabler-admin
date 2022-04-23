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

            <div class="page-wrapper">
                <x-header combine="0" sticky="0" overlap="1" />

                <x-page-title
                    :title="$title ?? ''"
                    :pretitle="$pretitle ?? ''"
                    :actions="$actions ?? ''"
                    :subtitle="$subtitle ?? ''" />

                <div class="page-body">
                    {{ $slot }}
                </div><!-- /.page-body -->

                <x-footer />
            </div><!-- /.page-wrapper -->
        </div><!-- /.page -->
        <x-scripts :js="$js ?? ''" />
    </body>
</html>
