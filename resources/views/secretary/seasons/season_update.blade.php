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
                <input type="hidden" name="id" value="{{$room->id}}">
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="discipline_name" name="name" value="{{$room->name}}">
                </div>
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Detalhes</label>
                    <input type="text" class=" form-control" id="details" name="details" value="{{$room->details}}>
                </div>
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Equipamento</label>
                    <input type="text" class=" form-control" id="equipment" name="equipment" value="{{$room->equipment}}>>
                </div>
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Codigo da Sala</label>
                    <input type="text" class=" form-control" id="code" name="code" value="{{$room->code}}>
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
