@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teachers._components.sidebar')
    @endcomponent

    <div class=" card col-9">
        <div class=" row-cols-lg-12 mx-3 my-3">
            <h1 class=" text-uppercase mb-2">Filtro</h1>
        </div>
        <div class=" card-body d-flex">
            {{-- route('pesquisar') --}}
            <form action="" method="post">
                @csrf
                <div class=" col">
                    <div class=" row"><label for="" class=" text-dark text-uppercase text-bold">Nome da Turma</label>
                        <input type="text" class=" form-control" id="name" name="name">
                    </div>
                    <div class=" row "><label for="" class=" text-dark text-uppercase text-bold">Código da Turma</label>
                        <input type="text" class=" form-control" id="code_class" name="code_class">
                    </div>
                    <div class=" row my-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Sala</label>
                        <input type="text" class=" form-control" id="code_room" name="code_room">
                    </div>
                </div>
                <div class=" col btn-group">
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
            <th scope="col">Código da Turma</th>
            <th scope="col">Ativa</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
         @foreach ($classes as $class)
        <tbody>
            <td scope="col">{{$class->id}}</td>
            <td scope="col">{{$class->name}}</td>
            <td scope="col">{{$class->code}}</td>
            <td scope="col">{{$class->active}}</td>
            <td scope="col">
                <div class=" btn-group">
                    <a href="{{route('teacher.score-form', $class->id)}}" class=" btn btn-success">Atribuir Nota</a>
                    <a href="{{route('teacher.score-list-form', $class->id)}}" class=" btn btn-primary">Editar Nota</a>
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
</div>
</div>
@endsection
