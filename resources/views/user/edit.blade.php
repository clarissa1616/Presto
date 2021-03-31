<x-layouts>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <h2 class="text-center font-italic textcolors font-weight-bold">Modifica profilo</h2>
            </div>
        </div>
    </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-lg-12 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            @if('message')
                            <p class="alert alert-success">{{session('message')}}</p>
                            @endif
                            <form action="{{route('user.update' , compact('user'))}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group col-lg-12">
                                    <label for="name" class="form-label">Nome e cogmome</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="name" class="form-label">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                                </div>
                                <button type="submit" class="btn coloresecondario text-white">Salva</button>
                                <a href="{{route('user.index')}}" class="btn btn-warning">Torna al profilo</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layouts>
