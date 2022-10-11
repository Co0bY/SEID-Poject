@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teachers._components.sidebar')
    @endcomponent
<div class="col-9">
    <div class=" card">
        <form action="{{route('teacher.score-create')}}" method="POST">
            @csrf
        <div class=" card-body">
            <div class=" col-12 text-center uppercase">
                <p> <span class="">Matricula: {{$student->registration}}</span>  Nome: {{$student->name}}</p>
            </div>

                <input type="hidden" name="classid" id="classid" value="{{$classid}}">
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
                <tbody>
                    <td scope="col">{{$student->id}}
                        <input type="hidden" name="registrationClass" id="registrationClass" value="{{$registrationClass}}">
                    </td>
                    <td scope="col">{{$student->registration}}</td>
                    <td scope="col">
                        <div class=" input-group">
                            <input type="text" class=" form-control" name="name" id="name" value="{{$student->name}}" readonly>
                        </div>
                    </td>
                    <td scope="col">
                        <div class=" input-group">
                          <input type="number" class="form-control" name="score" id="score" value="">
                        </div>
                    </td>
                    <td scope="col">
                        <div class=" input-group">
                            <input type="text" class="form-control" name="description" id="description" class=" form-control" placeholder="Ex: Nota da Prova">
                        </div>
                    </td>
                </tbody>
              </table>

        </div>
        <div class="card-footer d-flex">
            <div class=" btn-group col-3">
                <a href="{{route('teacher.score')}}" class=" btn btn-primary">Voltar</a>
            </div>
            <div class=" col-6"></div>
            <div class=" btn-group col-3">
                <button type="submit" class=" btn btn-success">Adicionar Nota</button>
            </div>
        </div>
        </form>
    </div>

</div>
</div>
@endsection
