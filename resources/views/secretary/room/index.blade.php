@extends('layouts.app')

@section('content')
    <div class=" d-flex">
        <div class=" row">
            <div class="col">
                @component('secretary._components.sidebar')
                @endcomponent
            </div>

            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <h1 class=" text-uppercase mb-2">Filtro</h1>
                        {{-- route('pesquisar') --}}
                        <form action="{{route('secretary.room-filtro')}}" method="post">
                            @csrf
                            <div class="col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nome</label>
                                <input type="text" class=" form-control" id="name" name="name">
                            </div>
                            <div class="col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Detalhes</label>
                                <input type="text" class=" form-control" id="details" name="details">
                            </div>
                            <div class="col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Equipamento</label>
                                <input type="text" class=" form-control" id="equipment" name="equipment">
                            </div>
                            <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Codigo
                                    da
                                    Sala</label>
                                <input type="text" class=" form-control" id="code" name="code">
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.room-create-form') }}"
                                        class=" btn btn-primary text-uppercase">
                                        Criar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12">
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome da Sala</th>
                        <th scope="col">Detalhes</th>
                        <th scope="col">Equipamento</th>
                        <th scope="col">Código da Sala</th>
                    </tr>
                </thead>
                @foreach ($rooms as $room)
                    <tbody>
                        <td scope="col">{{ $room->id }}</td>
                        <td scope="col">{{ $room->name }}</td>
                        <td scope="col">{{ $room->details }}</td>
                        <td scope="col">{{ $room->equipment }}</td>
                        <td scope="col">{{ $room->code }}</td>
                        <td scope="col">
                            <div class=" btn-group">
                                <a href="{{route('secretary.room-update-form', $room->id)}}" class=" btn btn-dark">Editar</a>
                                <a href="" class=" btn btn-danger">Deletar</a>
                            </div>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
