<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include ('layouts._partials.navbar')

    {{-- check for role this view is shared for the account settings an notifications --}}
    @hasanyrole('admin|webmaster')
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fe fe-home mr-1 text-secondary"></i> Dashboard
                </a>

                @if ($currentUser->hasRole('webmaster'))
                    <a class="nav-link" href="">
                        <i class="fe fe-list mr-1 text-secondary"></i> Responses
                    </a>
                @endif

                @hasanyrole('admin|webmaster')
                    <a class="nav-link {{ active('users.dashboard') }}" href="{{ route('users.dashboard') }}">
                        <i class="fe fe-users mr-1 text-secondary"></i> Users
                    </a>

                    <a class="nav-link {{ active('audit.index') }}" href="{{ route('audit.index') }}">
                        <i class="fe fe-activity mr-1 text-secondary"></i> Audit
                    </a>
                @endhasanyrole
            </nav>
        </div>
    @endhasanyrole

    <main role="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container-fluid">
            <span class="copyright">&copy; {{ date('Y') }}, {{ config('app.name') }}</span>

            <div class="float-right">
                <span class="copyright">v1.0.0</span>
            </div>
        </div>
    </footer>
</div>
</body>
</html>