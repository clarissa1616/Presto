<x-layouts>
    <!-- HEADER -->
<div class="container-fluid bg-white  sticky-offset">
    <div class="container mt-3 bg-white">
        <div class="row">
            <div class="col-lg-6 pt-3">
                <form action="{{ route('welcome.search') }}" method="GET">
                    <div class="d-flex form-group">
                    <input type="text" name="q" id="cerca" placeholder="{{__('ui.Cerca annuncio')}}" class="form-control w-100">
                    <button class="btn coloresecondario fontlogo w-25 ml-1" type="submit"><i class="fas fa-search text-white"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 pt-3">
                <form  method="get">
                        <select class="custom-select" name="URL" 
                        onchange="window.location.href= this.form.URL.options[this.form.URL.selectedIndex].value">
                            <option>{{__('ui.Scegli per categoria')}}</option>
                            @foreach($categories as $category)
                            <option value="{{route('announcement.category',
                            [$category->name,$category->id])}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 align-self-center d-flex justify-content-center">
                <img class="img-fluid" src="/img/pchome.png" alt="">
            </div>
            <div class="col-12 col-lg-6">
                <h3 class="font-weight-bold font-italic textcolor">{{__('ui.welcome')}}</h3>
                <p class="lead fontlogo text-left">{{__('ui.CREA I TUOI ANNUNCI SU PRESTO E VENDI TUTTO CIO\' ')}} <br> {{__('ui.CHE NON USI PIU\' ')}} <br> {{__('ui.ZERO COMMISSIONI E NESSUN LIMITE')}} <br> {{__('ui.DI INSERIMENTO ANNUNCI.')}} </p>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12">
                @if (session('announcement.created.success'))
                    <div class="alert alert-success  textcolors  font-italic mx-1 mx-md-3">Annuncio creato con successo</div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
            </div>
        </div>
    </div>
   <div class="container mb-5">
       <div class="row">
           <div class="col-lg-12">
               <h2 class="text-center font-italic textcolors font-weight-bold">{{__('ui.CATEGORIE PIU VISITATE')}}</h2>
           </div>
       </div>
       <div class="row text-center">
           <div class="col-lg-3 col-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h4 class="card-title textcolors">{{__('ui.Abbigliamento')}}</h4>
                    <p class="card-text"><i class="fas fa-tshirt fontawesome-custom"></i></p>
                    <a  href="http://localhost:8000/announcement/category/Abbigliamento/6/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
                </div>
            </div>
           </div>
           <div class="col-lg-3 col-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h4 class="card-title textcolors">{{__('ui.Motori')}}</h4>
                    <p class="card-text"><i class="fas fa-car fontawesome-custom"></i></p>
                    <a  href="http://localhost:8000/announcement/category/Motori/1/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h4 class="card-title textcolors">{{__('ui.Informatica')}}</h4>
                    <p class="card-text"><i class="fas fa-tv fontawesome-custom"></i></p>
                    <a  href="http://localhost:8000/announcement/category/Informatica/10/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h4 class="card-title textcolors">{{__('ui.Sport')}}</h4>
                    <p class="card-text"><i class="fas fa-running fontawesome-custom"></i></p>
                    <a  href="http://localhost:8000/announcement/category/Sport/2/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
                </div>
            </div>
        </div>
       </div>
       <div class="row text-center mt-3">
        <div class="col-lg-3 col-6 col-6">
         <div class="card border-0 shadow">
             <div class="card-body">
                 <h4 class="card-title textcolors">{{__('ui.Affitti')}}</h4>
                 <p class="card-text"><i class="fas fa-house-user fontawesome-custom"></i></p>
                 <a  href="http://localhost:8000/announcement/category/Affitti/11/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
             </div>
         </div>
        </div>
        <div class="col-lg-3 col-6">
         <div class="card border-0 shadow">
             <div class="card-body">
                 <h4 class="card-title textcolors">{{__('ui.Arredamento')}}</h4>
                 <p class="card-text"><i class="fas fa-chair fontawesome-custom"></i></p>
                 <a  href="http://localhost:8000/announcement/category/Arredamento/7/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-6">
         <div class="card border-0 shadow">
             <div class="card-body">
                 <h4 class="card-title textcolors">{{__('ui.Libri')}}</h4>
                 <p class="card-text"><i class="fas fa-book fontawesome-custom"></i></p>
                 <a  href="http://localhost:8000/announcement/category/Libri/4/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-6">
         <div class="card border-0 shadow">
             <div class="card-body">
                 <h4 class="card-title textcolors">{{__('ui.Giochi')}}</h4>
                 <p class="card-text"><i class="fas fa-gamepad fontawesome-custom"></i></p>
                 <a  href="http://localhost:8000/announcement/category/Giochi/4/announcements" class="btn coloresecondario d-block text-white">{{__('ui.SCEGLI')}}</a>
             </div>
         </div>
     </div>
    </div>
   </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center font-italic textcolors font-weight-bold">{{__('ui.ULTIMI ANNUNCI PUBBLICATI')}} </h2>
            </div>
        </div>
        <div class="row foto">
                @foreach ($announcements as $announcement)
                    <div class="col-lg-3 col-12">
                        <div class="card card-custom border-0 shadow my-3">
                            @if($announcement->images->first())
                                <a  href="{{ route('announcement.show', compact('announcement')) }}"><img src="{{$announcement->images->first()->getUrl(400, 300)}}" class="mx-auto img-fluid d-flex" alt="{{$announcement->title}}"></a>
                                @else                                    
                                <a  href="{{ route('announcement.show', compact('announcement')) }}"><img src="/img/no-image.png" class="mx-auto img-fluid d-flex" alt="{{$announcement->title}}"></a>
                                @endif
                            <hr>
                        <div class="d-flex justify-content-between">
                            <h5 class="ml-2 mt-1 fontlogo textcolors my-3 titleWrap">{{ $announcement->title }}</h5>
                            <h5 class="ml-2 fontlogo textcolors my-3 px-2 price">€{{ $announcement->price }}</h5>
                        </div>
                            <div class="card-body">
                                <p>Categoria: <a class= "category-crl text-center textcolors text-decoration-none"href="{{ route('announcement.category', 
                                ['name' => $announcement->category()->first()->name, 'id' => $announcement->category()->first()->id]) }}">
                                {{ $announcement->category->name }}</a></p>
                                <a  href="{{ route('announcement.show', compact('announcement')) }}"class="btn btn-primary coloresecondario d-block">{{__('ui.Guarda annuncio')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row border border-dark p-2 mt-5 mb-2">
                <div class="col-lg-3">
                    <img src="/img/mokup.jfif" alt="foto-presto" style="max-width: 200px;">
                    
                </div>
                <div class="col-lg-5 d-block align-self-center">
                    <h2 class="font-weight fontlogo textcolors">{{__('ui.Comincia a guadagnare')}}</h2>
                    <p>{{__('ui.Dai al tuo usato una seconda occasione: vendi quello che non usi più, presto.')}}</p>
                </div>
                <div class="col-lg-1 d-block align-self-center">
                </div>
                <div class="col-lg-3 d-block align-self-center">
                  <a class="btn btn-warning fontlogo textcolors d-block " href="{{route('announcement.create')}}"><i class="fas fa-plus border border-primary mr-2 text-primary" style="width: 31px;
                    height: 23px; font-size: 20px;"></i>{{__('ui.Crea Annuncio')}}</a> 
                </div>
            </div>
        </div>
    </x-layouts>
