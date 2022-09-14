@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('secretary._components.sidebar')
    @endcomponent

    <div class=" card col-9 d-flex">
        <div class=" card-body flex">
            <h1 class=" text-uppercase mb-2">Filtro</h1>
            <div class=" col btn-group mb-2">
                <a href="{{route('secretary.active.assign-class-form')}}" class=" btn btn-dark text-uppercase">Atribuir Turma</a>
                <a href="{{route('secretary.active.assign-registration-form')}}" class=" btn btn-dark text-uppercase">Adicionar Aluno</a>
                <a href="{{route('secretary.active.assign-discipline-form')}}" class=" btn btn-dark text-uppercase">Atribuir Disciplina</a>
            </div>
            {{-- route('pesquisar') --}}
            <form action=" " method="post">
                @csrf
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="name" name="name">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Expiração</label>
                    <input type="text" class=" form-control" id="expiration_date" name="expiration_date">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Id Da Sala</label>
                    <input type="text" class=" form-control" id="idroom" name="idroom">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                    <input type="text" class=" form-control" id="code" name="code">
                </div>
                <div class="row-cols btn-group">
                    <a href="{{route('secretary.active-create-form')}}" class=" btn btn-primary text-uppercase"> Criar</a>
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
            <th scope="col">Nome</th>
            <th scope="col">Data de Expiração</th>
            <th scope="col">ID da Sala</th>
            <th scope="col">Código da Disciplina</th>
          </tr>
        </thead>
         @foreach ($disciplines as $discipline)
        <tbody>
            <td scope="col">{{$discipline->id}}</td>
            <td scope="col">{{$discipline->name}}</td>
            <td scope="col">{{$discipline->expiration_date}}</td>
            <td scope="col">{{$discipline->idroom}}</td>
            <td scope="col">{{$discipline->code}}</td>
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
