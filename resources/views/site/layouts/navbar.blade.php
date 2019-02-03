<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href=" {{ route('home') }} "> {{ config('app.name') }} </a> --}}
        <a class="navbar-brand" href=" {{ route('home') }} ">
            <img src=" {{ asset('img/logo.png') }} " alt="{{ config('app.name') }}" style="width: 130px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/players" class="nav-link {{ (str_contains(URL::current(), 'players')) ? 'active':'' }}"> {{ __('Players') }} </a>
                </li>

                <li class="nav-item">
                    <a href="/teams" class="nav-link {{ (str_contains(URL::current(), 'teams')) ? 'active':'' }}"> {{ __('Teams') }} </a>
                </li>

                <li class="nav-item">
                    <a href="/tournaments" class="nav-link {{ (str_contains(URL::current(), 'tournaments')) ? 'active':'' }}"> Inscription au tournois</a>
                </li>

                <li class="nav-item">
                    <a href="/rules" class="nav-link {{ (str_contains(URL::current(), 'rules')) ? 'active':'' }}"> {{ __('Rules') }} </a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/GGLanBrest" target="_blank">
                            <img src="{{ asset('img/twitter.png ') }}" alt="Twitter" style="height: 35px;">
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/GGLANBREST/" target="_blank">
                            <img src="{{ asset('img/facebook.png ') }}" alt="Facebook" style="height: 35px;">
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="https://discord.gg/mApqnDW" target="_blank">
                            <img src="{{ asset('img/discord.png ') }}" alt="Discord" style="height: 35px;">
                        </a>
                    </li>
                </ul>


                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="btn btn-danger" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b>{{ Auth::user()->pseudo }}</b> <span class="caret"></span>
                        </a>
            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/players/{{ Auth::user()->id }}" class="dropdown-item"> {{ __('My Profile') }} </a>

                            <a href="/players/teams" class="dropdown-item"> {{ __('My teams') }} </a>

                            <a href="/players/{{ Auth::user()->id }}/edit" class="dropdown-item"> {{ __('Settings') }} </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
