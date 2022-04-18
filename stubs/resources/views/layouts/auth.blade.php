<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

        <!-- SEO -->
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body class="antialiased border-top-wide border-primary d-flex flex-column">
        <div class="flex-fill d-flex flex-column justify-content-center">
            <div class="container-tight py-6">
                <div class="text-center mb-4">
                    <img src="{{ asset('static/logo.svg') }}" height="35" alt="{{ config('app.name', 'Laravel') }}">
                </div>

                <x-errors />

                {{ $slot }}
            </div>
        </div>

        <x-scripts :js="$js ?? ''" />
    </body>
</html>
