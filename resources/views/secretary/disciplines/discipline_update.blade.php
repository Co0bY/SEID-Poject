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
                            <h1 class=" text-uppercase m-3">Formulário de Criação</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{ route('secretary.discipline-update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $discipline->id }}">
                            <div class=" col mb-3">
                                <label for=""class=" text-dark text-uppercase text-bold">Nome</label>
                                <input type="text" class=" form-control" id="name" name="name" value="{{old('name') ?? $discipline->name}}">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                    @endif
                                </div>
                            </div>
                            <div class=" col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                                <input type="text" class=" form-control" id="code" name="code" value="{{ old('code') ?? $discipline->code }}">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('code'))
                                    {{$errors->first('code')}}
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.discipline-index') }}"
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
