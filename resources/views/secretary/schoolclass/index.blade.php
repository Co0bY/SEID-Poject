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
                        <div class="col btn-group mb-5">
                            <a href="{{ route('secretary.add-student-form') }}" class=" btn btn-dark text-uppercase">
                                Adicionar Aluno</a>
                            <a href="{{ route('secretary.add-teacher-form') }}" class=" btn btn-dark text-uppercase">
                                Adicionar Professor</a>
                        </div>
                        <form action=" " method="post">
                            @csrf
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nome</label>
                                <input type="text" class=" form-control" id="name" name="name">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código
                                    da Turma</label>
                                <input type="text" class=" form-control" id="code" name="code">
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.class-create-form') }}"
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
            <div class="col-12">
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Código da Turma</th>
                            <th scope="col">Nome da Sala</th>
                        </tr>
                    </thead>
                    @foreach ($classes as $class)
                        <tbody>
                            <td scope="col">{{ $class->id }}</td>
                            <td scope="col">{{ $class->name }}</td>
                            <td scope="col">{{ $class->code }}</td>
                            <td scope="col">{{ $class->room->name }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="{{route('secretary.class-update-form', $class->id)}}" class=" btn btn-dark">Editar</a>
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
