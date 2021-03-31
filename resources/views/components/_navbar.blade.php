<nav class="navbar navbar-expand-lg navbar-custom sticky-top bg-white">
    <div class="container">
        <a href="{{route('welcome')}}"><img class="scala" src="/img/logo-officla.jfif" alt="logo"></a>
    <a  href="{{route('welcome')}}" class="textcolors  text-decoration-none font-italic font-weight-bold">PRESTO</a>
        <button class="navbar-toggler text-white justify-content-center coloresecondario" type="button" data-toggle="collapse" 
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon mt-1" style="font-size: small"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item">
                    <a class= "nav-link textcolors btn-warning" href="{{route('announcement.create')}}">{{__('ui.Inserisci Annuncio')}} </a>
                </li>
            </ul>
                <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto list-group list-group-horizontal">
                    
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item text-center mr-2">
                            <a class="nav-link " href="{{ route('login') }}"> <i class="icones-color far fa-user"></i></i> <h6 class="text-icone font-weight-light ">Login</h6> </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item text-center mr-2">
                            <a class="nav-link " href="{{ route('register') }}"><i class=" icones-color fas fa-sign-in-alt fa-1x"></i> <h6 class="text-icone font-weight-light ">{{__('ui.Registrati')}}</h6></a>
                        </li>
                    @endif
                @else

                @if(Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link textcolors mt-3 " href="{{ route('revisor.home')}}">Revisiona insezioni
                        <span class="badge badge-pill badge-warning">{{\App\Models\Announcement::TopRevisionedCount()}}</span></a>
                    </li>
                @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link textcolors dropdown-toggle mt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            <a class="dropdown-item" href="{{route('user.index')}}">
                                Il mio profilo
                            </a>
                            </a>
                            @if(Auth::user()->admin == 1)
                            <a class="dropdown-item" href="{{route('revisor.index')}}">
                                Candidati revisor
                            </a>
                            <a class="dropdown-item" href="{{route('revisorCreate.index')}}">
                                Lista Revisor accettati
                            </a>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

                <li class="nav-item text-center">
                    <a class="nav-link"><i class="icones-color far fa-heart"></i> <h6 class=" text-icone ">{{__('ui.Preferiti')}}</h6></a>
                </li>

                <div class="btn-group nav-item text-center mr-2 d-flex align-items-end">
                    
                    <a type="button" class="nav-link btn btn-white dropdown-toggle text-center  " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class=" icones-color fas fa-globe-europe fa-1x"><h6 class="text-icone font-weight-light mt-2 ">Lng</h6></i>
                    </a>
                    <div class="dropdown-menu flag-menu " style="min-width:auto; border:none;">
                        <x-_locale language='it' nation='it' />
                        <x-_locale language='gb' nation='gb' />
                        <x-_locale language='es' nation='es' />
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>
