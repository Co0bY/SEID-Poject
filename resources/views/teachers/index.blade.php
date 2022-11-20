@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class="row">
        <div class="col">
            @component('teachers._components.sidebar')
            @endcomponent
        </div>


        <div class="col">
            <div class=" card">
                <div class=" card-body">
                    <div class=" row ">
                        <h1 class=" text-uppercase m-3">Filtro</h1>
                    </div>

                    <form action="{{route('teacher.filtro-home')}}" method="post">
                        @csrf
                        <div class=" row mb-3">
                            <div class=" col"><label for="" class=" text-dark text-uppercase text-bold">Nome da Turma</label>
                                <input type="text" class=" form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class=" col"><label for="" class=" text-dark text-uppercase text-bold">Código da Turma</label>
                                <input type="text" class=" form-control" id="code_class" name="code_class">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <div class="col">
                                <label for="" class=" text-dark text-uppercase text-bold">Código da Sala</label>
                                <input type="text" class=" form-control" id="code_room" name="code_room">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class=" col btn-group">
                                <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
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
         @foreach ($classes as $class);
        <tbody>
            <td scope="col">{{$class->id}}</td>
            <td scope="col">{{$class->name}}</td>
            <td scope="col">{{$class->code}}</td>
            <td scope="col">
                @if ($class->active == 1)
                <p class="text-success">Ativo</p>
                @else
                <p class="text-danger">Inativo</p>
                @endif
            </td>
            <td scope="col">
                <div class=" btn-group">
                    <a href="{{route('teacher.lesson-index', $class->id)}}" onclick="alert()" class=" btn btn-dark">Plano de Aula</a>
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
</div>
</div>

<script>

    function alert() {
        alert('ola');
    }
</script>
@endsection
