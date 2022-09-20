@extends('layouts.app')


@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('secretary._components.sidebar')
    @endcomponent

    <div class=" card col-12 d-flex">
        <div class=" row-cols-lg mx-3 my-3">
            <h1 class=" text-uppercase mb-2">Formulario de Criação</h1>
        </div>
        <div class=" card-body d-flex">
            {{-- route('pesquisar') --}}
            <form action="{{route('secretary.discipline-create')}}" method="post">
                @csrf
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="discipline_name" name="discipline_name">
                </div>
                <div class=" mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                    <input type="text" class=" form-control" id="code" name="code">
                </div>
                <div class="row">
                    <a href="{{route('secretary.discipline-index')}}" class=" btn btn-primary text-uppercase">Voltar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Criar</button>
                </div>
              </form>
        </div>
    </div>
    </div>
</div>

@endsection

