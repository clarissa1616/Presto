<x-layouts>
  <hr>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('welcome.search') }}" method="GET">
                    <div class="d-block form-group">
                        <input type="text" name="q" id="cerca" placeholder="Cerca annuncio" class="form-control w-100">
                        <button class="btn coloresecondario fontlogo w-25 ml-1" type="submit"><i
                                class="fas fa-search text-white"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <form method="get">
                    <select class="custom-select" name="URL"
                        onchange="window.location.href= this.form.URL.options[this.form.URL.selectedIndex].value">
                        @foreach ($categories as $category)
                            <option
                                value="{{ route('announcement.category', [$category->name, $category->id]) }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="container fluid ">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="text-center text-primary my-3">ANNUNCI PER CATEGORIA: {{ $category->name }}</h2>
            </div>
            @foreach ($announcements as $announcement)
                <hr>
                <div class="card col-lg-12 mx-2 border-0 shadow mb-2 ">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="https://picsum.photos/200/300" class="card-img w-75" alt="img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $announcement->title }}</h4>
                                <p class="card-title font-weight-bold">Creato il:
                                    {{ $announcement->created_at->format('Y-m-d') }}</p>
                                <p class="font-weight-bold price">€ {{ $announcement->price }}</p>
                                {{-- <p class="card-title">{{$announcement->body}}</p> --}}
                                <a href="{{ route('announcement.show', compact('announcement')) }}"
                                    class="btn btn-primary coloresecondario mt-5">Guarda annuncio</a>
                                <p class="card-title mt-2">Pubblicato da: {{ $announcement->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts>
