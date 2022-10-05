@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teachers._components.sidebar')
    @endcomponent

<div class="col-9">
    <form action="{{route('teacher.attendance-score')}}" method="POST">
        @csrf
        <input type="hidden" name="classid" id="classid" value="{{$classid}}">
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col"><button type="submit" class=" btn btn-success">Atribuir Notas</button></th>
          </tr>
        </thead>
         @foreach ($students as $student)
        <tbody>
            <td scope="col">{{$student->id}}
            <input type="hidden" name="id[]" id="id[]" value="{{$student->id}}">
            </td>
            <td scope="col">{{$student->registration}}</td>
            <td scope="col">
                <div class=" input-group">
                    <input type="text" class=" form-control" name="name[]" id="name[]" value="{{$student->name}}" readonly>
                </div>
            </td>
            <td scope="col">
                <div class=" input-group">
                  <input type="number" name="score[]" id="score[]" value="0">
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
    </form>
</div>
</div>
@endsection
