@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teachers._components.sidebar')
    @endcomponent

<div class="col-9">
    <form action="" method="POST">
        @csrf
        @if(!empty($msg))
        <div class="alert alert-warning justify-content-center text-align-center" role="alert">
           {{$msg}}
        </div>
        @endif
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col"><button type="submit" class=" btn btn-success">Atribuir Notas em Massa</button></th>
            <th><input type="text" name="description" id="description" class=" form-control" placeholder="Ex: Nota da Prova"></th>
          </tr>
        </thead>
         @foreach ($registrations as $registration)
        <tbody>
            <td scope="col">{{$registration->id}}
            <input type="hidden" name="id[]" id="id[]" value="{{$student->id}}">
            </td>
            <td scope="col">{{$registration->registration}}</td>
            <td scope="col" colspan="2">
                <div class=" input-group">
                    <input type="text" class=" form-control" name="name[]" id="name[]" value="{{$registration->name}}" readonly>
                </div>
            </td>
            <td scope="col">
                <div class=" input-group">
                  <a href="" class=" btn btn-success"> Gerar Certificado</a>
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
    </form>
</div>
</div>
@endsection
