@extends('layouts.app')


@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('secretary._components.sidebar')
    @endcomponent

    <div class=" card col-12 d-flex">
        <div class=" row-cols-lg mx-3 my-3">
            <h1 class=" text-uppercase mb-2">Formulario de Adição de Turma</h1>
        </div>
        <div class=" card-body d-flex">
            {{-- route('pesquisar') --}}
            <form action="{{route('secretary.active.assign-class')}}" method="post">
                @csrf
                <div class=" col mb-5"><label for="" class=" text-dark text-uppercase text-bold">Matricula do Aluno</label>
                    <input type="text" class=" form-control" id="registration" name="registration">
                </div>
                <div class=" col  mb-5"><label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina Ativa</label>
                    <input type="text" class=" form-control" id="code_active" name="code_active">
                </div>
                <div class="col btn-group">
                    <a href="{{route('secretary.active-index')}}" class=" btn btn-primary text-uppercase">Voltar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Adicionar</button>
                </div>
              </form>
        </div>
    </div>
    </div>
</div>

@endsection

