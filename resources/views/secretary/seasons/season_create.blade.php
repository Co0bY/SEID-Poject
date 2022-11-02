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
                            <h1 class=" text-uppercase m-3">Formulario de Criação</h1>
                        </div>
                        <form action="{{ route('secretary.season-create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="discipline_name" name="name" value="{{old('name')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('name'))
                                        {{$errors->first('name')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Inicio</label>
                                    <input type="date" class=" form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('start_date'))
                                        {{$errors->first('start_date')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Encerramento</label>
                                    <input type="date" class=" form-control" id="end_date" name="end_date" value="{{old('end_date')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('end_date'))
                                        {{$errors->first('end_date')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Codigo
                                        do Período</label>
                                    <input type="text" class=" form-control" id="code" name="code" value="{{old('code')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('code'))
                                        {{$errors->first('code')}}
                                        @endif
                                    </div>
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
            </div>l
        </div>
    </div>
@endsection
