@extends('layouts.app')

@section('content')
<div class=" d-flex">
    <div class=" row-cols-lg-12">
        @component('teachers._components.sidebar')
        @endcomponent

        <div class=" card col-9">
            <div class=" card-body">
                <form action="{{route('teacher.homework-create')}}" POST>
                @csrf
                <input type="hidden" name="classid" id="classid" value="{{$classid}}">
                <div class=" col-12 text-center uppercase mt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <label for="title" class="form-label">TÍTULO</label>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class=" col-12 text-center uppercase mt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <label for="content" class="form-label">CONTEÚDO</label>
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" style="width: 100%"></textarea>
                    </div>
                </div>
                <div class=" col-12 text-center uppercase mt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <label for="assigned_archive" class="form-label">ARQUIVO ADICIONAL</label>
                        </div>
                    </div>
                    <div class="row-12">
                        <input class="form-control form-control-sm" type="file" id="assigned_archive" name="assigned_archive">
                    </div>
                </div>
                <div class=" col-12 text-center uppercase mt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <label for="score" class="form-label">NOTA(OPCIONAL)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class=" col-3">
                            <input class="form-control" type="text" name="score" id="score">
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
                <div class=" col-12 text-center uppercase mt-3">
                    <div class="btn-group">
                       <button type="submit" class="btn btn-success">Criar</button>
                       <a href="{{route('teacher.homework')}}" class=" btn btn-primary">Voltar</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
