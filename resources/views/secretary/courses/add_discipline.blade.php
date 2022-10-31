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
                        <form action="{{ route('secretary.course-add') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$course->id}}">
                            <div class="row">
                                <div class="col-8 mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nome do Curso</label>
                                    <input type="text" class=" form-control" readonly id="course_name" name="course_name" value="{{$course->name}}">
                                </div>
                                <div class="col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Código do Curso</label>
                                    <input type="text" class=" form-control" readonly id="course_code" name="course_code" value="{{$course->code}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <select name="discipline_id" id="discipline_id" class=" form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach ($disciplines as $discipline)
                                        <option value="{{$discipline->id}}">{{$discipline->name}} | {{$discipline->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.course-details', $course->id) }}"
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
