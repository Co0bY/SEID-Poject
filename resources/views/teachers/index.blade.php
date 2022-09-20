@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('teacher._components.sidebar')
    @endcomponent

    <div class=" card col-9">
        <div class=" row-cols-lg-12 mx-3 my-3">
            <h1 class=" text-uppercase mb-2">Filtro</h1>
        </div>
        <div class=" card-body d-flex">
            {{-- route('pesquisar') --}}
            <form action="" method="post">
                @csrf
                <div class=" row">
                    <div class=" col mb-3 mx-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                        <input type="text" class=" form-control" id="name" name="name">
                    </div>
                    <div class=" col mb-3 mx-3"><label for="" class=" text-dark text-uppercase text-bold">Email</label>
                        <input type="text" class=" form-control" id="email" name="email">
                    </div>
                    <div class=" col mb-3 mx-3"><label for="" class=" text-dark text-uppercase text-bold">CPF</label>
                        <input type="text" class=" form-control" id="cpf" name="cpf">
                    </div>
                </div>
                <div class=" row">
                    <div class=" col mb-3 mx-3"><label for="" class=" text-dark text-uppercase text-bold">Endereço</label>
                        <input type="text" class=" form-control" id="address" name="address">
                    </div>
                    <div class=" col mb-3 mx-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Nascimento</label>
                        <input type="date" class=" form-control" id="birth_date" name="birth_date">
                    </div>
                    <div class=" col mb-3 mx-3"><label for="" class=" text-dark text-uppercase text-bold">Tipo de Usuário</label>
                        <select name="type_of_user" id="type_of_user" class=" form-control">
                            <option value="">Selecione uma opção</option>
                            <option value="1">Diretor</option>
                            <option value="2">Secretário(a)</option>
                            <option value="4">Professor(a)</option>
                            <option value="3">Aluno(a)</option>
                        </select>
                    </div>
                </div>

                <div class=" btn-group">
                    <a href="" class=" btn btn-primary text-uppercase"> Criar</a>
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
            <th scope="col">Nome</th>
            <th scope="col">Código da Turma</th>
            <th scope="col">Ativa</th>
          </tr>
        </thead>
         @foreach ($classes as $class)
        <tbody>
            <td scope="col">{{$class->id}}</td>
            <td scope="col">{{$class->name}}</td>
            <td scope="col">{{$class->code}}</td>
            <td scope="col">{{$class->active}}</td>
            <td scope="col">
                <div class=" btn-group">
                    <a href="{{route('principal.edit-form', $user->id)}}" class=" btn btn-dark">Editar</a>
                    <a href="{{route('principal.delete-form', $user->id)}}" class=" btn btn-danger">Deletar</a>
                </div>
            </td>
        </tbody>
        @endforeach
      </table>
</div>
</div>
@endsection
