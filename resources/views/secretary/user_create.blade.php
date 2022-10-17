@extends('layouts.app')

@section('content')
    <div class=" d-flex">
        <div class=" row">
            <div class="col">
                @component('secretary._components.sidebar')
                @endcomponent
            </div>
            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <div class=" row">
                            <h1 class=" text-uppercase m-3">Formulario de Criação</h1>
                        </div>

                        <form action="{{ route('secretary.create') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class=" col"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="name" name="name">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Email</label>
                                    <input type="text" class=" form-control" id="email" name="email">
                                </div>

                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Senha</label>
                                    <input type="password" class=" form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">CPF</label>
                                    <input type="text" class=" form-control" id="cpf" name="cpf">
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Nascimento</label>
                                    <input type="date" class=" form-control" id="birth_date" name="birth_date">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Endereço</label>
                                    <input type="text" class=" form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Tipo de
                                        Usuário</label>
                                    <select name="type_of_user" id="type_of_user" class=" form-control">
                                        <option value="">Selecione uma opção</option>
                                        <option value="1">Diretor</option>
                                        <option value="2">Secretário(a)</option>
                                        <option value="4">Professor(a)</option>
                                        <option value="3">Aluno(a)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="btn-group col" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.users') }}"
                                        class=" btn btn-primary text-uppercase">Voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Criar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- route('pesquisar') --}}

                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
