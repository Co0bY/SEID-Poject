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
                            <h1 class=" text-uppercase m-3">Formulario de Edição</h1>
                        </div>
                        {{-- route('pesquisar') --}}
                        <form action="{{ route('secretary.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Nome</label>
                                    <input type="text" class=" form-control" id="name" name="name"
                                        value="{{ old('name') ?? $user->name }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('name'))
                                            {{$errors->first('name')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Email</label>
                                    <input type="text" class=" form-control" id="email" name="email"
                                        value="{{ old('email') ?? $user->email }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('email'))
                                            {{$errors->first('email')}}
                                        @endif
                                    </div>
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Senha</label>
                                    <input type="password" class=" form-control" id="password" name="password"
                                        value="{{ old('password') ?? $user->password }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('password'))
                                            {{$errors->first('password')}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">CPF</label>
                                    <input type="text" class=" form-control" id="cpf" name="cpf"
                                        value="{{ old('cpf') ?? $perfil->cpf }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                            @if($errors->has('cpf'))
                                            {{$errors->first('cpf')}}
                                        @endif
                                    </div>
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Data de Nascimento</label>
                                    <input type="date" class=" form-control" id="birth_date" name="birth_date"
                                        value="{{ old('birth_date') ?? $perfil->birth_date }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('birth_date'))
                                            {{$errors->first('birth_date')}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Endereço</label>
                                    <input type="text" class=" form-control" id="address" name="address"
                                        value="{{old('address') ?? $perfil->address }}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('address'))
                                            {{$errors->first('address')}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Tipo de Aluno</label>
                                    <select name="type" id="type" class=" form-control" disabled>
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
                            <input type="hidden" name="type_of_user" name="type_of_user" value="{{ $user->type_of_user }}">
                            <div class="row">
                                <div class=" col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.users') }}"
                                        class=" btn btn-primary text-uppercase">Voltar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
