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
            <form action=" " method="post">
                @csrf
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="discipline_name" name="name">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Detalhes</label>
                    <input type="text" class=" form-control" id="details" name="details">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Número de Carteiras</label>
                    <input type="text" class=" form-control" id="number_of_tables" name="number_of_tables">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Equipamento adicional</label>
                    <input type="text" class=" form-control" id="additional_equipment" name="additional_equipment">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Sala</label>
                    <input type="text" class=" form-control" id="code" name="code">
                </div>
                <div class="row btn-group">
                    <a href="{{route('secretary.room-create-form')}}" class=" btn btn-primary text-uppercase"> Criar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                </div>
              </form>
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
            <th scope="col">Númeto de Carteiras</th>
            <th scope="col">Equipamento Adicional</th>
            <th scope="col">Código da Sala</th>
          </tr>
        </thead>
         @foreach ($rooms as $room)
        <tbody>
            <td scope="col">{{$room->id}}</td>
            <td scope="col">{{$room->name}}</td>
            <td scope="col">{{$room->number_of_tables}}</td>
            <td scope="col">{{$room->additional_equipment}}</td>
            <td scope="col">{{$room->code}}</td>
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
@endsection
