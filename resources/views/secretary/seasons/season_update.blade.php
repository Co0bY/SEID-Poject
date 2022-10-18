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
                        <form action="{{ route('secretary.season-create') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$season->id}}">
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="discipline_name" name="name" value="{{$season->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Inicio</label>
                                    <input type="date" class=" form-control" id="start_date" name="start_date" value="{{$season->start_date}}">
                                </div>
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Encerramento</label>
                                    <input type="date" class=" form-control" id="end_date" name="end_date"  value="{{$season->end_date}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Codigo
                                        do Período</label>
                                    <input type="text" class=" form-control" id="code" name="code"  value="{{$season->code}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.season-index') }}"
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
