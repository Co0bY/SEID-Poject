@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class="row">
        <div class="col">
            @component('secretary._components.sidebar')
            @endcomponent
        </div>

        <div class="col">
            <div class=" card">
                <div class=" card-body">
                    <div class="row">
                        <h1 class=" text-uppercase m-3">Formulário de Edição</h1>
                    </div>


                    <form action="{{route('secretary.room-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$room->id}}">
                        <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                            <input type="text" class=" form-control" id="discipline_name" name="name" value="{{$room->name}}">
                        </div>
                        <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Detalhes</label>
                            <input type="text" class=" form-control" id="details" name="details" value="{{$room->details}}">
                        </div>
                        <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Equipamento</label>
                            <input type="text" class=" form-control" id="equipment" name="equipment" value="{{$room->equipment}}">
                        </div>
                        <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Codigo da Sala</label>
                            <input type="text" class=" form-control" id="code" name="code" value="{{$room->code}}">
                        </div>
                        <div class="row">
                            <div class="col btn-group" role="group" aria-label="Button group">
                                <a href="{{route('secretary.room-index')}}" class=" btn btn-primary text-uppercase">Voltar</a>
                                <button type="submit" class=" btn btn-success text-uppercase">Editar</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
