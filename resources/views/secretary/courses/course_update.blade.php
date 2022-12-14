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
                        <form action="{{ route('secretary.course-update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value ="{{$course->id}}">
                            <div class="col mb-3">
                                <label for=""class=" text-dark text-uppercase text-bold">Nome do Curso</label>
                                <input type="text" class=" form-control" id="name" name="name" value="{{$course->name}}">
                                @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                @endif
                            </div>
                            <div class=" col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Tipo do Curso</label>
                                <input type="text" class=" form-control" id="type_of_course" name="type_of_course" value="{{$course->type_of_course}}">
                                @if($errors->has('type_of_course'))
                                    {{$errors->first('type_of_course')}}
                                @endif
                            </div>
                            <div class=" col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Duração em Anos</label>
                                <input type="number" class=" form-control" id="duration_in_years" name="duration_in_years" value="{{$course->duration_in_years}}">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('duration_in_years'))
                                        {{$errors->first('duration_in_years')}}
                                    @endif
                                </div>
                            </div>
                            <div class=" col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Código do Curso</label>
                                <input type="number" class=" form-control" id="code" name="code" value="{{$course->code}}">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('code'))
                                        {{$errors->first('code')}}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.course-index') }}"
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
