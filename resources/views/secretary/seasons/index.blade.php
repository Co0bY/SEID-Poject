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
                            <h1 class=" text-uppercase m-3">Filtro -
                                @if($active == 1)
                                    Períodos Ativos
                                @else
                                    Períodos Inativos
                                @endif
                            </h1>
                        </div>
                        @if($active ==1)
                        <form action="{{route('secretary.season-filtro')}}" method="post">
                        @else
                        <form action="{{ route('secretary.season-inactive-filtro') }}" method="post">
                        @endif
                        {{-- route('pesquisar') --}}

                            @csrf
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Inicio</label>
                                    <input type="date" class=" form-control" id="start_date" name="start_date">
                                </div>
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Encerramento</label>
                                    <input type="date" class=" form-control" id="end_date" name="end_date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Codigo
                                        do
                                        Período</label>
                                    <input type="text" class=" form-control" id="code" name="code">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.season-create-form') }}"
                                        class=" btn btn-primary text-uppercase">
                                        Criar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                                </div>
                                <div class="col-1">

                                </div>
                                <div class="col-3 btn-group">
                                    <a href="{{route('secretary.season-index')}}" class=" btn btn-success text-uppercase">
                                        Ativos</a>
                                    <a href="{{route('secretary.season-inactive')}}" class=" btn btn-danger text-uppercase">
                                        Inativos</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
                        <td scope="col">{{ $season->id }}</td>
                        <td scope="col">{{ $season->name }}</td>
                        <td scope="col">{{ $season->start_date }}</td>
                        <td scope="col">{{ $season->end_date }}</td>
                        <td scope="col">{{ $season->code }}</td>
                        <td scope="col">
                            <div class=" btn-group">
                                <a href="{{ route('secretary.season-update-form', $season->id) }}"
                                    class=" btn btn-dark">Editar</a>
                                    @if($season->active == 1)
                                    <a href="{{route('secretary.season-delete-form', $season->id)}}" class=" btn btn-danger">Inativar</a>
                                    @else
                                    <a href="{{ route('secretary.season-reactive-form', $season->id) }}"
                                        class=" btn btn-danger">Reativar</a>
                                    @endif

                            </div>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
