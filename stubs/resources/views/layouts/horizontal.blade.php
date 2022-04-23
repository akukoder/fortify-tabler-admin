<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

        {{ $css ?? '' }}

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body class="antialiased d-flex flex-column {{ $theme }}">
        <div class="page">
            <x-header combine="0" sticky="1" overlap="0" vheader="0" />

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
