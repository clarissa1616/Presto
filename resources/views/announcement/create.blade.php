<x-layouts>
<div class="container my-5">
    @if (session('message'))
    <p class="alert alert-succes">{{session('message')}}</p>
    @endif
        <body>
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                  <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                       <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-center font-italic textcolors font-weight-bold">Crea il tuo annuncio</h5>
                      <form method="POST" action="{{route('announcement.store')}}">
                        @csrf
                            <input type="hidden" name="uniquesecret" value="{{$uniquesecret}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title">Titolo annuncio</label>
                                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title"
                                        placeholder="Titolo">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Prezzo</label>
                                        <input type="number" name="price" class="form-control" id="price" aria-describedby="price"
                                            placeholder="prezzo">
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <label for="body">Corpo dell'annuncio</label>
                                        <textarea name="body" cols="30" rows="10" class="form-control" id="body" placeholder="Scrivi qui la descrizione"></textarea>
                                        @error('body')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label for="category">Scegli categoria</label>
                                    <select class="form-select form-control mb-2" name="category" id="category" aria-label="Default select example">
                                        <option selected>Scegli categoria</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                    <div class="form-group row">
                                        <label for="images" class="col-md-12 col-form-label border-rounded">Inserisci qui le immagini</label>
                                        <div class="col-md-12">
                                            <div class="dropzone d-flex justify-content-center" id="drophere"><i class="far fa-image"></i></div>
                                            @error('images')
                                                <span class="invalid-feedback" role="alert"> <strong> {{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="text-center">La prima immagine caricata sarà quella di anteprima</p>
                                        </div>
                                    </div>
                                <button type="submit" class="btn coloresecondario text-white">Crea annuncio</button>
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </body>



















        {{-- <form method="POST" action="{{route('announcement.store')}}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="title">Titolo annuncio</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="title"
                            placeholder="Titolo">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Prezzo</label>
                            <input type="number" name="price" class="form-control" id="price" aria-describedby="price"
                                placeholder="prezzo">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="body">Corpo dell'annuncio</label>
                            <textarea name="body" cols="30" rows="10" class="form-control" id="body" placeholder="Scrivi qui la descrizione"></textarea>
                            @error('body')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <label for="category">Scegli categoria</label>
                        <select class="form-select form-control mb-2" name="category" id="category" aria-label="Default select example">
                            <option selected>Scegli categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Crea annuncio</button>
                </div>
            </div>
        </form> --}}

    {{-- </div> --}}
</div>
</x-layouts>