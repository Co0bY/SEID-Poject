@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
        @component('secretary._components.sidebar')
        @endcomponent

        <div class=" card col-9 d-flex">
            <div class=" card-body flex">
                <h1 class=" text-uppercase mb-2">Filtro</h1>
                {{-- route('pesquisar') --}}
                <a href="">Adicionar Aluno</a>
                <a href="">Adicionar Professor</a>
                <form action=" " method="post">
                    @csrf
                    <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                        <input type="text" class=" form-control" id="name" name="name">
                    </div>
                    <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Turma</label>
                        <input type="text" class=" form-control" id="code" name="code">
                    </div>
                    <div class="">
                        <a href="{{route('secretary.class-create-form')}}" class=" btn btn-primary text-uppercase"> Criar</a>
                        <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="">
        <div class="col-12">
            <hr>
            <table class="table" style="widht: 100%;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Código da Turma</th>
                </tr>
                </thead>
                @foreach ($classes as $class)
                <tbody>
                    <td scope="col">{{$class->id}}</td>
                    <td scope="col">{{$class->name}}</td>
                    <td scope="col">{{$class->code}}</td>
                    <td scope="col"><div class=" btn-group">
                        <a href="" class=" btn btn-dark">Editar</a>
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
