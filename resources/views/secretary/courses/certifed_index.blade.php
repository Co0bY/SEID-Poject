@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
        @component('secretary._components.sidebar')
        @endcomponent
<div class="col-9">
    <form action="" method="POST">
        @csrf
        @if($msg != "")
        <div class="alert alert-warning justify-content-center text-align-center" role="alert">
        {!! $msg !!}
        </div>
        @endif
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
          </tr>
        </thead>
         @foreach ($registrations as $registration)
        <tbody>
            <td scope="col">{{$registration->id}}
            <input type="hidden" name="id[]" id="id[]" value="{{$registration->id}}">
            </td>
            <td scope="col">{{$registration->registration}}</td>
            <td scope="col" colspan="2">
                <div class=" input-group">
                    <input type="text" class=" form-control" name="name[]" id="name[]" value="{{$registration->name}}" readonly>
                </div>
            </td>
            <td scope="col">
                <div class=" input-group">
                  <a href="{{route('secretary.certifed-create', $registration->id)}}" class=" btn btn-success"> Gerar Certificado</a>
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
    </form>
</div>
</div>


@endsection
