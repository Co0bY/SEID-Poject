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
                        <div class="row">
                            <h1 class=" text-uppercase m-3">Formulário de Edição</h1>
                        </div>

                        <form action="{{ route('secretary.class-update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $class->id }}">
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="name" name="name"
                                        value="{{ $class->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código da Turma</label>
                                    <input type="text" class=" form-control" id="code" name="code"
                                        value="{{ $class->code }}">
                                </div>
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código do Perpiodo</label>
                                    <input type="text" class=" form-control" id="season_code" name="season_code"
                                        value="{{ $class->season_code }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                                    <input type="text" class=" form-control" id="discipline_code" name="discipline_code"
                                        value="{{ $class->discipline_code }}">
                                </div>
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código da Sala</label>
                                    <input type="text" class=" form-control" id="room_code" name="room_code"
                                        value="{{ $class->room_code }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.class-index') }}"
                                        class=" btn btn-primary text-uppercase">Voltar</a>
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
