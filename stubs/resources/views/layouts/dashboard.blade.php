<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

        <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha256-cMPWkL3FzjuaFSfEYESYmjF25hCIL6mfRSPnW8OVvM4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-slim@3.0.0/dist/jquery.slim.min.js" integrity="sha256-Rf4BadfyCtsvHmO89BUZcbYvNNvZvOT08ALfEzvCsD0=" crossorigin="anonymous"></script>
        <script src="{{ asset('tabler/js/tabler.min.js') }}"></script>
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

                <footer class="footer footer-transparent d-print-none">
                    <div class="container">
                        <div class="row text-center align-items-center flex-row-reverse">
                            <div class="col-lg-auto ml-lg-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item">
                                        <a href="#" class="link-secondary">Help</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-secondary">Support</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-auto mt-3 mt-lg-0 me-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item">
                                        Copyright © 2020
                                        <a href="https://github.com/Proxeuse/fortify-tabler" class="link-secondary">Proxeuse</a>.
                                        All rights reserved.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
        <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dist/libs/jquery/dist/jquery.slim.min.js') }}"></script>
        <script src="{{ asset('tabler/js/tabler.min.js') }}"></script>
        {{ $js ?? '' }}
    </body>
</html>
