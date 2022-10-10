@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teachers._components.sidebar')
    @endcomponent
<div class="col-9">
    <div class=" card">
        <div class=" card-body">
            <div class=" col-12 text-center uppercase">
                <p> <span class="">Matricula: {{$student->registration}}</span>  Nome: {{$student->name}}</p>
            </div>
            <form action="{{route('teacher.score-create')}}" method="POST">
                @csrf
                <input type="hidden" name="classid" id="classid" value="{{$classid}}">
            <hr>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nome</th>
                    <th scope="col">
                        <div class=" btn-group">
                            <button type="submit" class=" btn btn-success">Adicionar Nota</button>
                            {{-- {{route('', $scores[0]->registration_in_class_id)}} --}}
                        </div>
                    </th>
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
            </form>
        </div>
    </div>

</div>
</div>
@endsection
