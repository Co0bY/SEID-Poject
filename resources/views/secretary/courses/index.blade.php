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
                            <h1 class=" text-uppercase m-3">Filtro</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{route('secretary.course-filtro')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nome do Curso</label>
                                    <input type="text" class=" form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-8 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Tipo de Curso</label>
                                    <input type="text" class=" form-control" id="type_of_course" name="type_of_course">
                                </div>
                                <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Duração em Anos</label>
                                    <input type="number" class=" form-control" id="duration_in_years" name="duration_in_years">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código do Curso</label>
                                    <input type="text" class=" form-control" id="code" name="code">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.course-create-form') }}"
                                        class=" btn btn-primary text-uppercase"> Criar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
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
                            <th scope="col">Tipo do Curso</th>
                            <th scope="col">Duração em Anos</th>
                            <th scope="col">Código do Curso</th>
                        </tr>
                    </thead>

                    @foreach ($courses as $course)
                        <tbody>
                            <td scope="col">{{ $course->id }}</td>
                            <td scope="col">{{ $course->name }}</td>
                            <td scope="col">{{ $course->type_of_course }}</td>
                            <td scope="col">{{ $course->duration_in_years }} Anos</td>
                            <td scope="col">{{ $course->code }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="{{ route('secretary.course-details', $course->id) }}"
                                        class=" btn btn-dark">Detalhes</a>
                                    <a href="" class=" btn btn-danger">Inativar</a>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
