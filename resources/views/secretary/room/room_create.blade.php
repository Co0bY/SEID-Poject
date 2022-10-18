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
                            <h1 class=" text-uppercase m3-2">Formulario de Criação</h1>
                        </div>
                        <form action="{{ route('secretary.room-create') }}" method="post">
                            @csrf
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nome</label>
                                <input type="text" class=" form-control" id="discipline_name" name="name">
                            </div>
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Detalhes</label>
                                <input type="text" class=" form-control" id="details" name="details">
                            </div>
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Equipamento</label>
                                <input type="text" class=" form-control" id="equipment" name="equipment">
                            </div>
                            <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Codigo
                                    da
                                    Sala</label>
                                <input type="text" class=" form-control" id="code" name="code">
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.room-index') }}"
                                        class=" btn btn-primary text-uppercase">Voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Criar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
