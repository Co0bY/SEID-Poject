@extends('layouts.app')

@section('content')
    <div class=" d-flex">
        <div class=" row-cols-lg-12">
            @component('secretary._components.sidebar')
            @endcomponent

            <div class=" card col-9 d-flex">

                <div class=" card-body flex">
                    <h1 class=" text-uppercase mb-2">Filtro</h1>
                    {{-- route('pesquisar') --}}
                    <form action=" " method="post">
                        @csrf
                        <div class=" row-cols-lg-3 mb-3"><label for=""
                                class=" text-dark text-uppercase text-bold">Data Inicial</label>
                            <input type="date" class=" form-control" id="initial_date" name="initial_date">
                        </div>
                        <div class=" row-cols-lg-3 mb-3"><label for=""
                                class=" text-dark text-uppercase text-bold">Data Final</label>
                            <input type="date" class=" form-control" id="final_date" name="final_date">
                        </div>
                        <div class=" row-cols-lg-3 mb-3"><label for=""
                            class=" text-dark text-uppercase text-bold">Matricula</label>
                        <input type="text" class=" form-control" id="registration" name="registration">
                    </div>
                    <div class=" row-cols-lg-3 mb-3"><label for=""
                            class=" text-dark text-uppercase text-bold">Código da Turma</label>
                        <input type="text" class=" form-control" id="class_code" name="class_code">
                    </div>
                    <div class=" row-cols-lg-3 mb-3"><label for=""
                        class=" text-dark text-uppercase text-bold">Código do Período</label>
                    <input type="text" class=" form-control" id="season_code" name="season_code">
                </div>
                        <div class="">
                            <button data-href="/extraction-attendance" class=" btn btn-success text-uppercase" id="exportFaltas" name="exportFaltas" onclick="exportFaltas(event.target)">Exportar Faltas</button>
                            <button data-href="/extraction-final-score" class=" btn btn-success text-uppercase" id="exportNotas" name="exportNotas" onclick="exportNotas(event.target)">Exportar Notas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaDataVazia" tabindex="-1" role="dialog" aria-labelledby="modalAguardeExportacao" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Atenção</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                É necessário especificar um período inicial e um período final <span class="bold">OU</span>  fornecer a Mátricula de um aluno para seguir com a exportação!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Ok, entendi</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modaNotas" tabindex="-1" role="dialog" aria-labelledby="modalAguardeExportacao" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Atenção</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Não é necessário Data para esse formulário;
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Ok, entendi</button>
            </div>
          </div>
        </div>
      </div>
    </div>


<script>
    function exportFaltas(_this) {
       let _url = $(_this).data('href');
       let btn = $(_this);
       let texto = $(_this).text();
       let initial_date = "initial_date=" + $('#initial_date').val();
       let final_date = "&final_date=" + $('#final_date').val();
       let registration = "&registration=" + $('#registration').val();
       let class_code = "&class_code=" + $('#class_code').val();
       let season_code = "&season_code=" + $('#season_code').val();
        if((initial_date == " " || final_date == " ") || registration == " "){
            $('#modaDataVazia').modal('show');
            console.log('teste')
            return;
       }
       btn.prop('disabled', true);
       btn.text('Aguarde...');
       $.ajax({
        url: _url + "?" + initial_date + final_date + registration + class_code + season_code,
            type: 'GET',
            async: true,
            cache: false,
            success: function (response) {
               window.open(response, '_blank');
            //    console.log(response);
               btn.prop('disabled', false);
               btn.text(texto);
            },
            complete: function() {
               btn.prop('disabled', false);
               btn.text(texto);
            },
            error: function(response){
                console.log(response);
            }
        });
    }

    function exportNotas(_this) {
       let _url = $(_this).data('href');
       let btn = $(_this);
       let texto = $(_this).text();
       let initial_date = "initial_date=" + $('#initial_date').val();
       let final_date = "&final_date=" + $('#final_date').val();
       let registration = "&registration=" + $('#registration').val();
       let class_code = "&class_code=" + $('#class_code').val();
       let season_code = "&season_code=" + $('#season_code').val();
        if((initial_date !== " " || final_date !== " ")){
            $('#modaNotas').modal('show');
            return;
       }
       btn.prop('disabled', true);
       btn.text('Aguarde...');
       $.ajax({
        url: _url + "?" + initial_date + final_date + registration + class_code + season_code,
            type: 'GET',
            async: true,
            cache: false,
            success: function (response) {
               window.open(response, '_blank');
            //    console.log(response);
               btn.prop('disabled', false);
               btn.text(texto);
            },
            complete: function() {
               btn.prop('disabled', false);
               btn.text(texto);
            },
            error: function(response){
                console.log(response);
            }
        });
    }
</script>
@endsection
