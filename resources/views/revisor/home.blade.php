<x-layouts>
    @if($announcement)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Id annuncio # {{ $announcement->id }}
                    </div>
                </div>
            </div>
        </div>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <h3>Utente</h3>
                    </div>
                    <div class="col-md-10">
                       Id utente #{{ $announcement->user->id }},
                       <br>
                        Nome utente: {{ $announcement->user->name }}
                        <br>
                        E-mail utente: {{ $announcement->user->email }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2"><h3>Titolo</h3></div>
                    <div class="col-md-10">{{ $announcement->title }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2"><h3>Descrizione</h3></div>
                    <div class="col-md-10">{{ $announcement->body }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2"><h3>Categoria</h3></div>
                    <div class="col-md-10">{{ $announcement->category->name }}</div>
                </div>
                <hr>
                <div class="row text-center mt-5">
                    <div class="col-lg-12">
                        <h3 class="font-italic textcolors font-weight-bold">VALIDAZIONE IMMAGINI</h3>
                    </div>
                </div>
                        <div class="row mt-3">
                            @foreach ($announcement->images as $image)
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ $image->getUrl(300 , 150) }}"  class="img-fluid" alt="img">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">IA GOOGLE</h5>
                                            <ul>  
                                                    <p class="card-text">Adulti: {{ $image->adult }}</p>
                                                    <p class="card-text">Satira: {{ $image->spoof }}</p>
                                                    <p class="card-text">Medicale: {{ $image->medical }}</p>
                                                    <p class="card-text">Violenza: {{ $image->violence }}</p>
                                                    <p class="card-text">Razzismo: {{ $image->racy }}</p>
                                            </ul>
                                            @if($image->labels)
                                            <hr>
                                                <h5 class="card-title">Etichettato come:</h5>
                                                <ul>
                                                    @foreach($image->labels as $label)
                                                        <li>{{ $label }}</li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- {{$image->id}}<br>
                                {{$image->file}} <br>
                                {{Storage::url($image->file)}} <br> --}}
                        </div>
                        <div class="row mt-5 mb-5">
                            <div class="col-lg-2 col-6">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal"><i class="fas fa-trash mr-1"></i>Rifiuta</button>
                            </div>
                            <div class="col-lg-2 col-6">
                            <form action="{{route('revisor.accept' , ['announcement'=>$announcement->id])}}" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-success"><i class="fas fa-thumbs-up mr-1"></i>Accetta</button>
                            </form>
                        </div>
                    </div>
                </div>
                

                {{-- Modale Rifiuta annuncio --}}
        <div id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Rifiuta revisione</h5>
                </div>
                <div class="modal-body">
                  <p>Sei sicuro di voler rifiutare ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn coloresecondario text-white" data-dismiss="modal">Esci</button>
                  <form action="{{route('revisor.reject' , ['announcement'=>$announcement->id])}}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Rifiuta</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
    </div>    

    {{-- Else non ci sono annunci --}}
    @else
    <div class="container revisor-redirect">
        <div class="row text-center">
            <div class="col-lg-12 mt-5">
                <h3>Non ci sono annunci da revisionare</h3>   
            </div>
        </div>
    </div>
    @endif
</x-layouts>