@extends('layouts.app')

@section('content')
    <div class=" d-flex">
        <div class=" row">
            <div class="col">
                @component('teachers._components.sidebar')
                @endcomponent
            </div>
            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <div class="row">
                            <h1 class=" text-uppercase m-3">Turma - {{$class->name}}</h1>
                        </div>
                            <input type="hidden" name="id" id="id" value="{{$class->id}}">
                                    <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Período Ativo</label>
                                        <input type="text" class=" form-control" readonly id="season" name="season" value="{{$class->season}}">
                                    </div>
                                    <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Sala</label>
                                        <input type="text" class=" form-control" readonly id="room" name="room" value="{{$class->room}}">
                                    </div>
                                    <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Disciplina</label>
                                        <input type="text" class=" form-control" readonly id="discipline" name="discipline" value="{{$class->discipline}}">
                                    </div>
                                    <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código da Disciplina</label>
                                        <input type="text" class=" form-control" readonly id="code" name="code" value="{{$class->code}}">
                                    </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('teacher.index') }}"
                                        class=" btn btn-primary text-uppercase"> voltar</a>
                                    <button type="button" class=" btn btn-success text-uppercase" onclick="showModal()">Adicionar Aulas</button></button>
                                </div>
                            </div>
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
                            <th scope="col">Número da Aula</th>
                            <th scope="col">Conteudo</th>
                            <th scope="col">Notas da Aula</th>
                        </tr>
                    </thead>

                    @foreach ($lessons as $lesson)
                        <tbody>
                            <td scope="col">{{ $lesson->number_of_lesson }}</td>
                            <td scope="col">{{ $lesson->content }}</td>
                            <td scope="col">{{ $lesson->notes }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="{{route('teacher.lesson-edit-form', $lesson->id)}}" class=" btn btn-success">Editar</a>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAddLessons" tabindex="-1" role="dialog"
                    aria-labelledby="modalAddLessons" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ESCOLHA O MÉTODO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body d-inline">
                                <input type="hidden" name="classid" id="classid" value="{{$class->id}}">
                                <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Número de Aulas que deseja adicionar</label>
                                    <input type="number" class=" form-control"  id="number_of_lesson" name="number_of_lesson" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-href="/teacher/lesson/add" class="btn btn-primary"
                                    onclick="addLessons()" id="btnAdd">Adicionar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalEditLesson" tabindex="-1" role="dialog"
                aria-labelledby="modalEditLesson" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edição</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body d-inline">
                            <input type="hidden" name="classid" id="classid" value="{{$class->id}}">
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Número de Aulas que deseja adicionar</label>
                                <input type="number" class=" form-control"  id="number_of_lesson" name="number_of_lesson" value="1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-href="/teacher/lesson/add" class="btn btn-primary"
                                onclick="addLessons()" id="btnAdd">Adicionar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

                <script>
                    function showModal() {
                        $('#modalAddLessons').modal('show');
                    }

                    function closeModal() {
                        $('#modalAddLessons').modal('dismiss');
                    }

                    function addLessons() {
                    let id = "id=" + $('#classid').val();
                    let number_of_lesson = "&number_of_lesson=" + $('#number_of_lesson').val();
                    let _url = $('#btnFecharNotas').data('href');
                    $('#btnAdd').prop('disabled', true);
                    $('#btnAdd').text('Aguarde');
                    $.ajax({
                        url: "/teacher/lesson-add" + "?" + id + number_of_lesson,
                        type: 'GET',
                        async: true,
                        cache: true,
                        success: function(response) {
                            $('#btnAdd').prop('disabled', false);
                            $('#btnAdd').text('Adicionar');
                            document.location.href = response;
                        },
                        complete: function() {
                            $('#btnAdd').prop('disabled', false);
                            $('#btnAdd').text('Adicionar');
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                }
                </script>
@endsection
