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
                        <form action=" " method="post">
                            @csrf
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Nom do Cursoe</label>
                                <input type="text" class=" form-control" id="discipline_name" name="name">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Tipo de Curso</label>
                                <input type="text" class=" form-control" id="type_of_course" name="type_of_course">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Duração em Anos</label>
                            <input type="text" class=" form-control" id="duration_in_years" name="duration_in_years">
                        </div>
                        <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código do Curso</label>
                            <input type="text" class=" form-control" id="code" name="code">
                        </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.discipline-create-form') }}"
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
                        </tr>
                    </thead>

                    @foreach ($courses as $course)
                        <tbody>
                            <td scope="col">{{ $course->id }}</td>
                            <td scope="col">{{ $course->name }}</td>
                            <td scope="col">{{ $course->type_of_course }}</td>
                            <td scope="col">{{ $course->duration_in_years }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="{{ route('secretary.course-edit-form', $course->id) }}"
                                        class=" btn btn-dark">Editar</a>
                                    <a href="" class=" btn btn-danger">Deletar</a>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
