@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class=" d-flex">
        <div class=" row-cols-lg-12">
            @component('teachers._components.sidebar')
            @endcomponent
            <div class="col-9">
                <div class=" card">

                        <div class=" card-body">
                            <form action="{{ route('teacher.score-update') }}" method="POST">
                                @csrf
                            <div class=" col-12 text-center uppercase">
                                <p> <span class="">Matricula: {{ $student->registration }}</span> Nome:
                                    {{ $student->name }}</p>
                            </div>
                            <input type="hidden" name="registrationClass" id="registrationClass"
                                value="{{ $registrationClass }}">
                            <input type="hidden" name="classid" id="classid" value="{{ $classid }}">
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Matricula</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Notas</th>
                                        <th scope="col">Descrição</th>
                                    </tr>
                                </thead>
                                @foreach ($scores as $score)
                                    <tbody>
                                        <td scope="col">{{ $score->id }}
                                            <input type="hidden" name="id[]" id="id[]" value="{{ $score->id }}">
                                            <input type="hidden" name="registrationClass" id="registrationClass"
                                                value="{{ $registrationClass }}">
                                        </td>
                                        <td scope="col">{{ $student->registration }}</td>
                                        <td scope="col">
                                            <div class=" input-group">
                                                <input type="text" class=" form-control" name="name[]" id="name[]"
                                                    value="{{ $student->name }}" readonly>
                                            </div>
                                        </td>
                                        <td scope="col">
                                            <div class=" input-group">
                                                <input type="number" class="form-control" name="score[]" id="score[]"
                                                    value="{{ $score->score }}">
                                            </div>
                                        </td>
                                        <td scope="col">
                                            <div class=" input-group">
                                                <input type="text" class="form-control" name="description[]"
                                                    id="description[]" class=" form-control" placeholder="Ex: Nota da Prova"
                                                    value="{{ $score->description }}">
                                            </div>
                                        </td>
                                    </tbody>
                                @endforeach
                            </table>
                            </form>
                        </div>
                        <div class="card-footer d-flex">
                            <div class="col-3"> <button type="submit" class=" btn btn-success col-12">Atualizar
                                    Notas</button></div>
                            <div class="col-6">
                                <a href="{{ route('teacher.score-create-form', [$registrationClass, $classid]) }}"
                                    class=" btn btn-dark col-12">Adicionar Nota</a>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger col-12" id="fecharNotas" onclick="showModal()">
                                    Fechar Notas
                                </button>
                            </div>
                        </div>

                </div>
                <div class="modal fade" id="modalFecharNotas" tabindex="-1" role="dialog"
                    aria-labelledby="modalFecharNotas" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ESCOLHA O MÉTODO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body d-inline">
                                <div class="form-check mx-3 my-3">
                                    <input class="form-check-input" type="radio" name="soma" id="soma">
                                    <label class="form-check-label" for="soma">
                                        Soma
                                    </label>
                                </div>
                                <div class="form-check mx-3 my-3">
                                    <input class="form-check-input" type="radio" name="mediaAritimetica"
                                        id="mediaAritimetica">
                                    <label class="form-check-label" for="mediaAritimetica">
                                        Média Aritimética
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-href="/teacher/fecharNota" class="btn btn-primary"
                                    onclick="fecharNotas()" id="btnFecharNotas">Fechar Nota</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal() {
            $('#modalFecharNotas').modal('show');
        }

        function closeModal() {
            $('#modalFecharNotas').modal('dismiss');
        }

        function fecharNotas() {
            let registrationClassId = "&registrationClassId=" + $('#registrationClass').val();
            let metodo = "";
            let _url = $('#btnFecharNotas').data('href');
            if ($('#soma').prop('checked') == true) {
                metodo = "&metodo=" + "soma";
            }
            if ($('#mediaAritimetica').prop('checked') == true) {
                metodo = "&metodo=" + "mediaAritimetica"
            }
            $('#fecharNotas').prop('disabled', true);
            $('#fecharNotas').text('Aguarde');
            if ($('#soma').prop('checked') == false && $('#mediaAritimetica').prop('checked') == false) {
                $('#fecharNotas').prop('disabled', false);
                $('#fecharNotas').text('Fechar Notas');
                return alert('Por Favor selecione uma opção');
            }
            $.ajax({
                url: _url + "?" + registrationClassId + metodo,
                type: 'GET',
                async: true,
                cache: false,
                success: function(response) {
                    $('#fecharNotas').prop('disabled', false);
                    $('#fecharNotas').text('Fechar Notas');
                    document.location.href = "/teacher/score";
                },
                complete: function() {
                    $('#fecharNotas').prop('disabled', false);
                    $('#fecharNotas').text('Fechar Notas');
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
@endsection
