@extends('layouts.app')


@section('content')
    <div class=" d-flex">
        <div class=" row">
            <div class="col">
                @component('secretary._components.sidebar')
                @endcomponent
            </div>

            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <div class=" row">
                            <h1 class=" text-uppercase m-3">Formulario de Atribuição</h1>
                        </div>
                        <form action="{{ route('secretary.add-teacher') }}" method="post">
                            @csrf
                            <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">CPF do
                                    Professor</label>
                                <input type="text" class=" form-control" id="cpf" name="cpf">
                            </div>
                            <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código
                                    da Turma</label>
                                <input type="text" class=" form-control" id="code" name="code">
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.class-index') }}"
                                        class=" btn btn-primary text-uppercase">Voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Adicionar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>l

        </div>
    </div>
@endsection
