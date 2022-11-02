@extends('layouts.app')


@section('content')
    <div class=" d-flex">
        <div class="row">
            <div class="col">
                @component('secretary._components.sidebar')
                @endcomponent
            </div>

            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <div class=" row">
                            <h1 class=" text-uppercase mb-2">Formulario de Criação</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{ route('secretary.discipline-create') }}" method="post">
                            @csrf
                            <div class="col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                                <input type="text" class=" form-control" value="{{old('name')}}" id="name" name="name">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                    @endif
                                </div>
                            </div>
                            <div class=" col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                                <input type="text" class=" form-control" value="{{old('code')}}" id="code" name="code">
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
