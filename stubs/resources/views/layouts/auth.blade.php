<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

        <link href="{{ asset('tabler/css/tabler.min.css') }}?{{ time() }}" rel="stylesheet" />

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha256-cMPWkL3FzjuaFSfEYESYmjF25hCIL6mfRSPnW8OVvM4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-slim@3.0.0/dist/jquery.slim.min.js" integrity="sha256-Rf4BadfyCtsvHmO89BUZcbYvNNvZvOT08ALfEzvCsD0=" crossorigin="anonymous"></script>
        <script src="{{ asset('tabler/js/tabler.min.js') }}?{{ time() }}"></script>
        {{ $js ?? '' }}
    </body>
</html>
