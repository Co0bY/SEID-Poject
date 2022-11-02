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

                        {{-- route('pesquisar') --}}
                        <form action="{{ route('secretary.add-student') }}" method="post">
                            @csrf
                            <div class="col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Matriculá
                                    do Aluno</label>
                                <input type="text" class=" form-control" id="registration" name="registration" value="{{old('registration')}}">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('registration'))
                                    {{$errors->first('registration')}}
                                    @endif
                                </div>
                            </div>
                            <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código
                                    da
                                    Turma</label>
                                <input type="text" class=" form-control" id="code" name="code" value="{{old('code')}}">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('code'))
                                    {{$errors->first('code')}}
                                    @endif
                                </div>
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
            </div>
        </div>
    </div>
@endsection
