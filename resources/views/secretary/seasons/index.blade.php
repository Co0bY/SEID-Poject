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
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="discipline_name" name="name">
                </div>
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Inicio</label>
                    <input type="date" class=" form-control" id="start_date" name="start_date">
                </div>
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Encerramento</label>
                    <input type="date" class=" form-control" id="end_date" name="end_date">
                </div>
                <div class="mb-3"><label for="" class=" text-dark text-uppercase text-bold">Codigo do Período</label>
                    <input type="text" class=" form-control" id="code" name="code">
                </div>
                <div class="row btn-group">
                    <a href="{{route('secretary.season-create-form')}}" class=" btn btn-primary text-uppercase"> Criar</a>
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
            <th scope="col">Nome do Periodo</th>
            <th scope="col">Data Inicial</th>
            <th scope="col">Data de Encerraemnto</th>
            <th scope="col">Código do Periodo</th>
          </tr>
        </thead>
         @foreach ($seasons as $season)
        <tbody>
            <td scope="col">{{$season->id}}</td>
            <td scope="col">{{$season->name}}</td>
            <td scope="col">{{$season->start_date}}</td>
            <td scope="col">{{$season->end_date}}</td>
            <td scope="col">{{$season->code}}</td>
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
