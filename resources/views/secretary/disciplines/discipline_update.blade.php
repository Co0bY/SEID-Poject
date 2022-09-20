@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('secretary._components.sidebar')
    @endcomponent

    <div class=" card col-9 d-flex">
        <div class=" card-body flex">
            <h1 class=" text-uppercase mb-2">Formulário de Criação</h1>
            {{-- route('pesquisar') --}}
            <form action="{{route('secretary.update')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$discipline->id}}">
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="name" name="name" value="{{$discipline->name}}">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="discipline_name" name="discipline_name" value="{{$discipline->name}}">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                    <input type="text" class=" form-control" id="code" name="code" value="{{$discipline->name}}">
                </div>
                <div class="row">
                    <a href="{{route('secretary.users')}}" class=" btn btn-primary text-uppercase">Voltar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Editar</button>
                </div>
              </form>
        </div>

    </div>
    </div>
</div>

@endsection
