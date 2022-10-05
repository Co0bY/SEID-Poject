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
            <form action="{{route('teacher.score-update')}}" method="POST">
                @csrf
                <input type="hidden" name="classid" id="classid" value="{{$classid}}">
            <hr>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nome</th>
                    <th scope="col"><button type="submit" class=" btn btn-success">Atualizar Notas</button></th>
                  </tr>
                </thead>
                 @foreach ($scores as $score)
                <tbody>
                    <td scope="col">{{$score->id}}
                    <input type="hidden" name="id[]" id="id[]" value="{{$score->id}}">
                    </td>
                    <td scope="col">{{$student->registration}}</td>
                    <td scope="col">
                        <div class=" input-group">
                            <input type="text" class=" form-control" name="name[]" id="name[]" value="{{$student->name}}" readonly>
                        </div>
                    </td>
                    <td scope="col">
                        <div class=" input-group">
                          <input type="number" name="score[]" id="score[]" value="{{$score->score}}">
                        </div>
                    </td>
                </tbody>
                @endforeach
              </table>
            </form>
        </div>
    </div>

</div>
</div>
@endsection
