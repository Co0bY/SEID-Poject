@extends('layouts.app')

@section('content')
    <div class=" d-flex">
        <div class="row">
            <div class="col">
                @component('principal._components.sidebar')
                @endcomponent
            </div>
            <div class="col">
                <div class=" card">
                    <div class=" card-body">
                        <div class="row">
                            <h1 class=" text-uppercase m-3">Formulário de Reativação</h1>
                        </div>
                        {{-- route('pesquisar') --}}
                        <form action="{{ route('principal.reactive') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="name" name="name"
                                        value="{{ $user->name }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Email</label>
                                    <input type="text" class=" form-control" id="email" name="email"
                                        value="{{ $user->email }}" readonly>
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Senha</label>
                                    <input type="password" class=" form-control" id="password" name="password"
                                        value="{{ $user->password }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">CPF</label>
                                    <input type="text" class=" form-control" id="cpf" name="cpf"
                                        value="{{ $perfil->cpf }}" readonly>
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Data de
                                        Nascimento</label>
                                    <input type="date" class=" form-control" id="birth_date" name="birth_date"
                                        value="{{ $perfil->birth_date }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Endereço</label>
                                    <input type="text" class=" form-control" id="address" name="address"
                                        value="{{ $perfil->address }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Tipo de
                                        Aluno</label>
                                    <select name="type_of_user" id="type_of_user" class=" form-control" disabled>
                                        <option value="">Selecione uma opção</option>
                                        <option value="1" @if ($user->type_of_user == 1) selected @endif>Diretor
                                        </option>
                                        <option value="2" @if ($user->type_of_user == 2) selected @endif>
                                            Secretário(a)
                                        </option>
                                        <option value="4" @if ($user->type_of_user == 4) selected @endif>
                                            Professor(a)
                                        </option>
                                        <option value="3" @if ($user->type_of_user == 3) selected @endif>Aluno(a)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('principal.users-inactive') }}" class=" btn btn-primary text-uppercase">Voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Reativar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
