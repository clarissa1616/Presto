<x-layouts>
    <div class="container-fluid mb-5 bg-show">
        <div class="container d-block">
                <div class="card-body bg-white">
                    <div class="row">
                        <div class="col-lg-8 align-self-center">
                            @if($announcement->images->first())
                                    <img src="{{$announcement->images->first()->getUrl(400, 300)}}"
                                     class="mx-auto img-fluid d-flex zoom" id="imgMain" alt="{{$announcement->title}}">
                                @else                                    
                                    <img src="/img/no-image.png" class="mx-auto img-fluid d-flex" alt="{{$announcement->title}}">
                                @endif
                                <hr>
                                <div class="row mt-3">
                                    @foreach ($announcement->images as $i=>$imgGallery)
                                        <div class="col-lg-2 col-4">
                                            <img 
                                                src="{{ $imgGallery->getUrl(400,300) }}" 
                                                class="img-fluid" id="img-gallery{{$i}}" alt="img">
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        <div class="col-lg-4 text-left mt-3 border-left">
                            <h4 class="font-weight-bold">{{ $announcement->category->name}}</h4>
                            <hr>
                            <p class="">Creato il: {{ $announcement->created_at->format('Y-m-d') }} - ID:{{ $announcement->id }}</p>
                            <h3 class="font-weight-bold">{{ $announcement->title }}</h3>
                            <h4 class="font-weight-bold price">{{ $announcement->price}} €</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="font-weight-bold">{{ $announcement->user->name }} </p>
                                    <a href="mailto:{{$announcement->user->email}}?subject=Informazioni per l'annuncio {{$announcement->title}} - Presto.it" class="btn btn-warning">Contatta</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 text-left text-black">
                            <h4 class="font-weight-bold">Descrizione</h4>
                            <p>{{ $announcement->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('script')
            <script src="/js/annsho.js"></script>
            <script>
                let img_num = @json(count($announcement->images));
            </script>
    @endpush
    
</x-layouts>

