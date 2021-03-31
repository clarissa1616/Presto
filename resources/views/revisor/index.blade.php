<x-layouts>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="text-center">Candidati Revisor</h3>
                    <div class="row revisor-index">
                        <div class="col-lg-12 col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Indirizzo</th>
                                        <th scope="col" class="text-right">Azione</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revisors as $revisor)
                                    @if ($revisor->user->is_revisor == 0)
                                        <tr>
                                            <th scope="row">{{ $revisor->id }}</th>
                                            <td>{{ $revisor->user->name }}</td>
                                            <td>{{ $revisor->user->email }}</td>
                                            <td>{{ $revisor->phone }}</td>
                                            <td>{{ $revisor->address }}</td>
                                            <td> 
                                                <form action="{{ route('revisor.destroyRevisor' , [$revisor->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">ELIMINA RICHIESTA</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('revisor.revisorTrue' , [$revisor->user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-success" type="submit">RENDI REVISORE</button>
                                                </form>
                                            </td>
                                        </div>
                                        @endif
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </x-layouts>