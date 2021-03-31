<x-layouts>
    <div class="container revisor-index">
        <div class="row mt-3">
            <div class="col-lg-12">
              {{-- @if('message')
              <p class="text-center alert alert-success">{{session('message')}}</p>   
              @endif --}}
                <h2 class="text-center font-italic textcolors font-weight-bold">Il mio profilo</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3 d-flex justify-content-center">
                <img class="w-75" src="https://www.mariomonfrecola.it/wp-content/uploads/2020/02/mariomonfrecola_social_2020-1024x1024.png" alt="">
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome e cognome</th>
                        <th scope="col">email</th>
                        @if (Auth::user()->is_revisor === 1)
                        {{-- <th scope="col">Cognome</th> --}}
                        <th scope="col">Telefono</th>
                        <th scope="col">Indirizzo</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">{{Auth::user()->id}}</th>
                        <td>{{Auth::user()->name}}</td>
                        <td>{{Auth::user()->email}}</td>
                        @if (Auth::user()->is_revisor === 1)
                        {{-- <td>{{$userRevisor->surname}}</td> --}}
                        <td>{{$userRevisor->phone}}</td>
                        <td>{{$userRevisor->address}}</td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                <a class="btn btn-primary mt-3" href="{{route('user.edit' , compact('user' , 'userRevisor'))}}"> Modifica profilo</a>
             </div>             
        </div>
    </div>
</x-layouts>