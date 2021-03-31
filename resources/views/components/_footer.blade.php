<div class="container-fluid">
    <div class="row text-white bg-dark pt-5 pb-5 mb-3">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-2">
            <ul class="list-unstyled">
                <h5 class="text-left">{{__('ui.Servizio clienti')}}</h5>
                <li><a href="">Login</a></li>
                <li><a href="">Admin</a></li>
                <li><a href="" >{{__('ui.Chi siamo')}}</a></li>
                {{-- @if (Auth::user()->is_revisor == 1)     --}}
                <li><a href="{{route('revisor.create')}}">{{__('ui.Diventa revisor')}}</a></li>
                {{-- @endif --}}
            </ul>
        </div>
        <div class="col-lg-2">
            <ul class="list-unstyled">
                <h5 class="text-left">{{__('ui.Servizio assistenza')}}</h5>
                <li><a href="">{{__('ui.Termini e condizioni')}}</a></li>
                <li><a href="">{{__('ui.Resi e rimborsi')}}</a></li>
                <li><a href="" >{{__('ui.Contattaci')}}</a></li>
            </ul>
        </div>
            <div class="col-lg-2">
                <ul>
                    <div class="social-icon">
                            <p><a href=""><i class="fab fa-facebook ml-2"></i></a><a href=""><i class="fab fa-instagram-square ml-2"></i></a><a href=""><i class="fab fa-youtube-square ml-2"></i></a><a href=""><i class="fab fa-tiktok ml-2"></i></a></p>
                        </div>
                    <h5 class="font-weight-bold text-primary fontlogo textcolor text-left"> <img class="img-fluid scala"src="/img/logo-officla.jfif" alt="logo"> PRESTO </h5>
                </ul>
                </div>
            <div class="col-lg-3">
            </div>
        </div>
            <div class="row p-1">
                <div class="col-lg-12 col-12">
                    <p class="text-center text-primary">copyright 2021 | Anunciamento | P.iva 0000000000 | {{__('ui.Realizzato da Vincitori')}} </p>
                </div>
            </div>
        </div>
    
