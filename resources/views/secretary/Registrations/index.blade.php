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
                        <h1 class=" text-uppercase mb-2">Filtro</h1>
                        {{-- route('pesquisar') --}}
                        <form action=" " method="post">
                            @csrf
                            <div class=" col mb-3"><label for=""
                                    class=" text-dark text-uppercase text-bold">Matrícula</label>
                                <input type="text" class=" form-control" id="registration" name="registration">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Data de
                                    Expiração</label>
                                <input type="date" class=" form-control" id="expiration_date" name="expiration_date">
                            </div>
                            <div class=" col mb-3"><label for="" class=" text-dark text-uppercase text-bold">Código
                                    do Periodo Válido</label>
                                <input type="text" class=" form-control" id="code" name="cpde">
                            </div>
                            <div class="row">
                                <div class="col btn-group" role="group" aria-label="Button group">
                                    <a href="{{ route('secretary.registration-create-form') }}"
                                        class=" btn btn-primary text-uppercase"> Criar</a>
                                    <button type="submit" class=" btn btn-success text-uppercase">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Matrícula</th>
                            <th scope="col">Id Do Aluno</th>
                            <th scope="col">Ativo</th>
                        </tr>
                    </thead>
                    @foreach ($registrations as $registration)
                        <tbody>
                            <td scope="col">{{ $registration->id }}</td>
                            <td scope="col">{{ $registration->registration }}</td>
                            <td scope="col">{{ $registration->student_id }}</td>
                            <td scope="col">{{ $registration->active }}</td>
                            <td scope="col">
                                <div class=" btn-group">
                                    <a href="" class=" btn btn-dark">Editar</a>
                                    <a href="" class=" btn btn-danger">Deletar</a>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
