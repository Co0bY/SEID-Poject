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
                            <h1 class=" text-uppercase m-3">Curso - {{$course->name}}</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{route('secretary.course-update')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$course->id}}">
                                <div class="row">
                                    <a href="{{route('secretary.course-add-form', $course->id)}}" class="btn btn-dark col-12 mb-4">Adicionar Disciplina</a>
                                </div>
                                <div class="row">
                                    <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome do Curso</label>
                                        <input type="text" class=" form-control" id="discipline_name" name="name" value="{{old('name') ?? $course->name}}">
                                        <div class="mt-1" style="color: red" role="alert">
                                            @if($errors->has('name'))
                                            {{$errors->first('name')}}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-8 mb-3">
                                        <label for="" class=" text-dark text-uppercase text-bold">Tipo de Curso</label>
                                        <input type="text" class=" form-control" id="type_of_course" name="type_of_course" value="{{old('type_of_course') ?? $course->type_of_course}}">
                                        <div class="mt-1" style="color: red" role="alert">
                                            @if($errors->has('type_of_course'))
                                                {{$errors->first('type_of_course')}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-4 mb-3">
                                        <label for="" class="text-dark text-uppercase text-bold">Duração em Anos</label>
                                        <input type="text" class=" form-control" id="duration_in_years" name="duration_in_years" value="{{old('duration_in_years') ?? $course->duration_in_years}}">
                                        <div class="mt-1" style="color: red" role="alert">
                                            @if($errors->has('duration_in_years'))
                                                {{$errors->first('duration_in_years')}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código do Curso</label>
                                    <input type="text" class=" form-control" id="code" name="code" value="{{old('code') ?? $course->code}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('code'))
                                            {{$errors->first('code')}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.course-index') }}"
                                        class=" btn btn-primary text-uppercase"> voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Editar</button>
                                </div>
                            </div>

                        </form>
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
                            <th scope="col">Nome</th>
                            <th scope="col">Código da Disciplina</th>
                        </tr>
                    </thead>

                    @foreach ($disciplines as $discipline)
                        <tbody>
                            <td scope="col">{{ $discipline->id }}</td>
                            <td scope="col">{{ $discipline->name }}</td>
                            <td scope="col">{{ $discipline->code }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="{{route('secretary.course-remove', ['courseid' => $course->id, 'disciplineid' => $discipline->id])}}" class=" btn btn-danger">Remover</a>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
