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
                <input type="hidden" name="id" value="{{$class->id}}">
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="name" name="name" value="{{$class->id}}">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Turma</label>
                    <input type="text" class=" form-control" id="code" name="code" value="{{$class->code}}">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código do Perpiodo</label>
                    <input type="text" class=" form-control" id="season_code" name="season_code" value="{{$class->season_code}}">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                    <input type="text" class=" form-control" id="discipline_code" name="discipline_code" value="{{$class->discipline_code}}">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Sala</label>
                    <input type="text" class=" form-control" id="room_code" name="room_code" value="{{$class->room_code}}">
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
