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
                        <div class="row">
                            <h1 class=" text-uppercase m-3">Filtro</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{route('secretary.discipline-filtro')}}" method="post">
                            @csrf
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nome</label>
                                <input type="text" class=" form-control" id="discipline_name" name="discipline_name">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código
                                    da Disciplina</label>
                                <input type="text" class=" form-control" id="code" name="code">
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.discipline-create-form') }}"
                                        class=" btn btn-primary text-uppercase"> Criar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Codigo da Disciplina</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>

                    @foreach ($disciplines as $discipline)
                        <tbody>
                            <td scope="col">{{ $discipline->id }}</td>
                            <td scope="col">{{ $discipline->name }}</td>
                            <td scope="col">{{ $discipline->code }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="{{ route('secretary.discipline-edit-form', $discipline->id) }}"
                                        class=" btn btn-dark">Editar</a>
                                    <a href="" class=" btn btn-danger">Deletar</a>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
