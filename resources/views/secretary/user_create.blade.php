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
                                    <input type="text" class=" form-control" id="name" name="name" value="{{old('name')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('name'))
                                        {{$errors->first('name')}}
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Email</label>
                                    <input type="text" class=" form-control" id="email" name="email" value="{{old('email')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Senha</label>
                                    <input type="password" class=" form-control" id="password" name="password" value="{{old('password')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                        @endif
                                    </div>
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Confirme a Senha</label>
                                    <input type="password" class=" form-control" id="confirm_password" name="confirm_password" value="{{old('password')}}">
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
                                    <input type="text" class=" form-control" id="cpf" name="cpf" value="{{old('cpf')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('cpf'))
                                        {{$errors->first('cpf')}}
                                        @endif
                                    </div>
                                </div>
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Data
                                        de
                                        Nascimento</label>
                                    <input type="date" class=" form-control" id="birth_date" name="birth_date" value="{{old('birth_date')}}">
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
                                    <input type="text" class=" form-control" id="address" name="address" value="{{old('address')}}">
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('address'))
                                        {{$errors->first('address')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3"><label for=""
                                        class=" text-dark text-uppercase text-bold">Tipo de
                                        Usuário</label>
                                    <select name="type_of_user" id="type_of_user" class=" form-control">
                                        <option value="">Selecione uma opção</option>
                                        <option value="1" {{old('type_of_user') == 1 ? 'selected' : ''}}>Diretor</option>
                                        <option value="2" {{old('type_of_user') == 2 ? 'selected' : ''}}>Secretário(a)</option>
                                        <option value="4" {{old('type_of_user') == 4 ? 'selected' : ''}}>Professor(a)</option>
                                        <option value="3" {{old('type_of_user') == 3 ? 'selected' : ''}}>Aluno(a)</option>
                                    </select>
                                    <div class="mt-1" style="color: red" role="alert">
                                        @if($errors->has('type_of_user'))
                                        {{$errors->first('type_of_user')}}
                                    @endif
                                </div>
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
