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
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Matrícula</label>
                    <input type="text" class=" form-control" id="registration" name="registration">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Expiração</label>
                    <input type="date" class=" form-control" id="expiration_date" name="expiration_date">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código do Periodo Válido</label>
                    <input type="text" class=" form-control" id="code" name="cpde">
                </div>
                <div class="">
                    <a href="{{route('secretary.registration-create-form')}}" class=" btn btn-primary text-uppercase"> Criar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                </div>
              </form>
        </div>
    </div>
</div>
<div class="col-12">
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Id Do Aluno</th>
            <th scope="col">Data de Expiração</th>
          </tr>
        </thead>
         @foreach ($registrations as $registration)
        <tbody>
            <td scope="col">{{$registration->id}}</td>
            <td scope="col">{{$registration->registration}}</td>
            <td scope="col">{{$registration->idstudent}}</td>
            <td scope="col">{{$registration->expiration_date}}</td>
            <td scope="col"><div class=" btn-group">
                <a href="" class=" btn btn-dark">Editar</a>
                <a href="" class=" btn btn-danger">Deletar</a>
            </div>
            </td>
        </tbody>
        @endforeach
      </table>
</div>
</div>
@endsection
