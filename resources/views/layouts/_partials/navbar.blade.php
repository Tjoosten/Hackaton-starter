<nav class="navbar navbar-laravel navbar-expand-lg navbar-dark bg-dark">
        <img src="{{ config('platform.thumbnails.navbar') }}" width="25" height="25" class="mr-3 rounded-circle d-inline-block align-top" alt="{{ config('app.name', 'Laravel') }}">
        <a class="navbar-brand mr-auto mr-lg-0" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                    <li class="ml-2 nav-item">
                    <a class="nav-link {{ active('contact.index') }}" href="{{ route('contact.index') }}">
                        Contact
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @auth
                    @impersonating
                        <span class="navbar-text text-danger mr-1">
                            <i class="fe fe-alert-triangle mr-1"></i> Impersonated user
                        </span>
                    @endImpersonating

                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fe fe-bell mr-1"></i> 0
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-user mr-1"></i> {{ $currentUser->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                            @hasanyrole('admin|webmaster')
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="fe fe-home mr-1 text-secondary"></i> Admin panel
                                </a>
                            @endhasanyrole

                            <a class="dropdown-item" href="{{ route('users.show', $currentUser) }}">
                                <i class="fe fe-sliders mr-1 text-secondary"></i> Account settings
                            </a>

                            <div class="dropdown-divider"></div>

                            @impersonating
                                <a class="dropdown-item" href="{{ route('impersonate.leave') }}">
                                    <i class="fe text-danger mr-1 fe-log-out"></i> Leave impersonation
                                </a>
                            @endImpersonating

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fe text-danger mr-1 fe-power"></i> Afmelden
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf {{-- Form field protection --}}
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="fe fe-log-in mr-1"></i> Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fe fe-user-plus mr-1"></i> Register
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>