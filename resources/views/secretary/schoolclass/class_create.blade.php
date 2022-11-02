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

                        {{-- route('pesquisar') --}}
                        <form action="{{ route('secretary.class-create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="name" name="name" value="{{old('name')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('name'))
                                        {{$errors->first('name')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código
                                        da
                                        Turma</label>
                                    <input type="text" class=" form-control" id="code" name="code" value="{{old('code')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('code'))
                                        {{$errors->first('code')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código
                                        do
                                        Perpiodo</label>
                                    <input type="text" class=" form-control" id="season_code" name="season_code" value="{{old('season_code')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('season_code'))
                                        {{$errors->first('season_code')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código
                                        da
                                        Disciplina</label>
                                    <input type="text" class=" form-control" id="discipline_code" name="discipline_code" value="{{old('discipline_code')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('discipline_code'))
                                        {{$errors->first('discipline_code')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código
                                        da
                                        Sala</label>
                                    <input type="text" class=" form-control" id="room_code" name="room_code" value="{{old('room_code')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('room_code'))
                                        {{$errors->first('room_code')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.class-index') }}"
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
