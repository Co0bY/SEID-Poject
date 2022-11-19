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
                            <h1 class=" text-uppercase m-3">Formulário de Inativação</h1>
                        </div>

                        <form action="{{ route('secretary.class-reactive') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $class->id }}">
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" readonly id="name" name="name"
                                        value="{{ old('name') ?? $class->name }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('name'))
                                        {{$errors->first('name')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código da Turma</label>
                                    <input type="text" class=" form-control" readonly id="code" name="code"
                                        value="{{ old('code') ?? $class->code }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('code'))
                                        {{$errors->first('code')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código do Período</label>
                                    <input type="text" class=" form-control" id="season_code" name="season_code"
                                        value="{{ old('season_code') ?? $class->season_code }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('season_code'))
                                        {{$errors->first('season_code')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                                    <input type="text" class=" form-control" readonly id="discipline_code" name="discipline_code"
                                        value="{{ old('discipline_code') ?? $class->discipline_code }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('discipline_code'))
                                        {{$errors->first('discipline_code')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Código da Sala</label>
                                    <input type="text" class=" form-control" readonly id="room_code" name="room_code"
                                        value="{{ old('room_code') ?? $class->room_code }}">
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
                                    <button type="submit" class=" btn btn-success text-uppercase">Reativar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
