<x-layouts>
    <div class="container-fluid mt-5">
        <div class="row revisor-index">
            <div class="col-lg-12">
                <h3 class="text-center">Lista Revisor</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Indirizzo</th>
                                <th scope='col'>Azione</th>
                              </tr>
                            </thead>
                            <tbody> 
                              @foreach ($userRevisors as $userRevisor)                 
                                <tr>
                                    <td>{{$userRevisor->id}}</td>
                                    <td>{{$userRevisor->name}}</td>
                                    <td>{{$userRevisor->email}}</td>
                                    <td>{{$userRevisor->revisorCreate->phone}}</td>
                                    <td>{{$userRevisor->revisorCreate->address}}</td>
                                    <td>
                                    <form action="{{ route('revisor.destroyRevisorAccept' , [$userRevisor->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" >Elimina Revisor</button>
                                  </form>
                                </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts>