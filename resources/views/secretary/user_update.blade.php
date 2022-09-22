@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('secretary._components.sidebar')
    @endcomponent

    <div class=" card col-9 d-flex">
        <div class=" card-body flex">
            <h1 class=" text-uppercase mb-2">Formulário de Criação</h1>
            {{-- route('pesquisar') --}}
            <form action="{{route('secretary.update')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Email</label>
                    <input type="text" class=" form-control" id="email" name="email" value="{{$user->email}}">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Senha</label>
                    <input type="password" class=" form-control" id="password" name="password" value="{{$user->password}}">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">CPF</label>
                    <input type="text" class=" form-control" id="cpf" name="cpf" value="{{$perfil->cpf}}">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Endereço</label>
                    <input type="text" class=" form-control" id="address" name="address" value="{{$perfil->address}}">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Nascimento</label>
                    <input type="date" class=" form-control" id="birth_date" name="birth_date" value="{{$perfil->birth_date}}">
                </div>
                <div class=" row-cols-lg-3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Tipo de Aluno</label>
                    <select name="type" id="type" class=" form-control" disabled>
                        <option value="" >Selecione uma opção</option>
                        <option value="1" @if($user->type_of_user == 1) selected @endif>Diretor</option>
                        <option value="2" @if($user->type_of_user == 2) selected @endif>Secretário(a)</option>
                        <option value="4" @if($user->type_of_user == 4) selected @endif>Professor(a)</option>
                        <option value="3" @if($user->type_of_user == 3) selected @endif>Aluno(a)</option>
                    </select>
                </div>
                <input type="hidden" name="type_of_user" name="type_of_user" value="{{$user->type_of_user}}">
                <div class="row">
                    <a href="{{route('secretary.users')}}" class=" btn btn-primary text-uppercase">Voltar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Editar</button>
                </div>
              </form>
        </div>

    </div>
    </div>
</div>

@endsection
