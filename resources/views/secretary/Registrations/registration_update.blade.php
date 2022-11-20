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
                            <h1 class=" text-uppercase m-3">Formulario de Edição</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{ route('secretary.registration-update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$registration->id}}">
                            {{-- <div class="row">
                                <div class="col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome
                                        do
                                        Aluno</label>
                                    <input type="text" class=" form-control" id="name" name="name" readonly>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="" class=" text-dark text-uppercase text-bold">Cpf do Aluno</label>
                                    <input type="text" class=" form-control" id="cpf" name="cpf" readonly value="{{old('cpf') ?? $registration->student->cpf }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('cpf'))
                                        {{$errors->first('cpf')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="" class=" text-dark text-uppercase text-bold">Código do Periodo Válido</label>
                                    <input type="text" class=" form-control" id="code" name="code" value="{{old('code') $registration->season->code}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('code'))
                                        {{$errors->first('code')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="" class=" text-dark text-uppercase text-bold">Código do Curso</label>
                                    <input type="text" class=" form-control" id="course_code" name="course_code" value="{{old('course_code') ?? $registration->course_code}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('course_code'))
                                        {{$errors->first('course_code')}}
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.registration-index') }}"
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
