@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
    @component('principal._components.sidebar')
    @endcomponent

    <div class=" card col-9 d-flex">
        <div class=" row-cols-lg mx-3 my-3">
            <h1 class=" text-uppercase mb-2">Formulario de Criação</h1>
        </div>
        <div class=" card-body d-flex">
            {{-- route('pesquisar') --}}
            <form action="{{route('principal.create')}}" method="post">
                @csrf
                <div class=" row mb-3"><label for="" class=" text-dark text-uppercase text-bold">Nome</label>
                    <input type="text" class=" form-control" id="name" name="name">
                </div>
                <div class=" row mb-3"><label for="" class=" text-dark text-uppercase text-bold">Email</label>
                    <input type="text" class=" form-control" id="email" name="email">
                </div>
                <div class=" row mb-3"><label for="" class=" text-dark text-uppercase text-bold">Senha</label>
                    <input type="password" class=" form-control" id="password" name="password">
                </div>
                <div class=" row mb-3"><label for="" class=" text-dark text-uppercase text-bold">CPF</label>
                    <input type="text" class=" form-control" id="cpf" name="cpf">
                </div>
                <div class=" row mb-3"><label for="" class=" text-dark text-uppercase text-bold">Endereço</label>
                    <input type="text" class=" form-control" id="address" name="address">
                </div>
                <div class=" row3 mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de Nascimento</label>
                    <input type="date" class=" form-control" id="birth_date" name="birth_date">
                </div>
                <div class=" row mb-3"><label for="" class=" text-dark text-uppercase text-bold">Tipo de Usuário</label>
                    <select name="type_of_user" id="type_of_user" class=" form-control">
                        <option value="">Selecione uma opção</option>
                        <option value="1">Diretor</option>
                        <option value="2">Secretário(a)</option>
                        <option value="4">Professor(a)</option>
                        <option value="3">Aluno(a)</option>
                    </select>
                </div>
                <div class="row">
                    <a href="{{route('principal.users')}}" class=" btn btn-primary text-uppercase">Voltar</a>
                    <button type="submit" class=" btn btn-success text-uppercase">Criar</button>
                </div>
              </form>
        </div>

    </div>
    </div>
</div>

@endsection
