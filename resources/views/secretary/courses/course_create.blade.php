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
                        <form action="{{ route('secretary.course-create') }}" method="post">
                            @csrf
                            <div class="col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Nome do Curso</label>
                                <input type="text" value="{{old('name')}}" class=" form-control" id="name" name="name">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                    @endif
                                </div>
                            </div>
                            <div class=" col mb-3">
                                <label for="" class=" text-dark text-uppercase text-bold">Tipo do Curso</label>
                                <input type="text" value="{{old('type_of_course')}}" class=" form-control" id="type_of_course" name="type_of_course">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('type_of_course'))
                                    {{$errors->first('type_of_course')}}
                                    @endif
                                </div>
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Duração em Anos</label>
                                <input type="number" value="{{old('duration_in_years')}}" class=" form-control" id="duration_in_years" name="duration_in_years">
                                <div class="mt-1" style="color: red" role="alert">
                                    @if($errors->has('duration_in_years'))
                                    {{$errors->first('duration_in_years')}}
                                    @endif
                                </div>
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código do Curso</label>
                                <input type="text" value="{{old('code')}}" class=" form-control" id="code" name="code">
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
