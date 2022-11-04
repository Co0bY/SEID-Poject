@extends('layouts.app')


@section('content')
    <div class=" d-flex">
        <div class="row">
            <div class="col">
                @component('teachers._components.sidebar')
                @endcomponent
            </div>

            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <div class=" row">
                            <h1 class=" text-uppercase mb-2">Formulario de Edição</h1>
                        </div>

                        {{-- route('pesquisar') --}}
                        <form action="{{route('teacher.lesson-edit')}}" method="post">
                            @csrf
                            <input type="hidden" class=" form-control" id="id" name="id" value="{{$lesson->id}}}">
                            <input type="hidden" class=" form-control" id="class_id" name="class_id" value="{{$lesson->class_id}}}">
                            <div class="col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Número da Aula</label>
                                <input type="text" class=" form-control" id="number_of_lesson" name="number_of_lesson" value="{{$lesson->number_of_lesson}}">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Conteudo</label>
                                <input type="text" class=" form-control" id="content" name="content" value="{{$lesson->content}}">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Anotação</label>
                                <input type="text" class=" form-control" id="notes" name="notes" value="{{$lesson->notes}}"
                                @if ($lesson->notes == "Faça uma chamada para adicionar") disabled
                                @else enabled
                                @endif>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{route('teacher.lesson-index', $lesson->class_id)}}"
                                        class=" btn btn-primary text-uppercase">Voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">editar</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
