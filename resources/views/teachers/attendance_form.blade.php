@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teachers._components.sidebar')
    @endcomponent

<div class="col-9">
    <form action="{{route('teacher.attendance-make')}}" method="POST">
        <div class="row">
            <div class="col">
                <label for="" class=" text-dark text-uppercase text-bold">Número da Aula</label>
                <select name="lesson_id" id="lesson_id" class=" form-control" required>
                    @foreach ($lessons as $lesson)
                        <option value="{{$lesson->id}}"> {{$lesson->number_of_lesson}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="" class=" text-dark text-uppercase text-bold">Contéudo da Aula</label>
                <input type="text" id="content" name="content" class=" form-control" required>
            </div>
            <div class="col">
                <label for="" class=" text-dark text-uppercase text-bold">Observações</label>
                <input type="text" id="notes" name="notes" class=" form-control" required>
            </div>
            <div class="col">
                <label for="" class=" text-dark text-uppercase text-bold">Dia da Chamada</label>
                <input type="date" id="date_of_attendance" name="date_of_attendance" required max="{{date('dd/mm/YYYY')}}" class=" form-control">
            </div>
        </div>
        @csrf
        <input type="hidden" name="classid" id="classid" value="{{$class->id}}">
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col"><button type="submit" class=" btn btn-success">Fazer Chamada</button></th>
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
                    <select name="attendance[]" id="attendance[]" class=" form-control">
                        <option value="0">Faltou</option>
                        <option value="1">Presente</option>
                    </select>
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
    </form>
</div>
</div>
@endsection
