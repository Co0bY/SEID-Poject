@extends('layouts.app')



@section('content')
<div class=" d-flex">
    <div class=" row">
        <div class=" col ">
            @component('secretary._components.sidebar')
            @endcomponent
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SEJA BEM VINDO {{session()->get('name')}}</h5>
                    <p class="card-text"> Seja Bem vindo ao programa SEID </p>
                    <p>Grafico</p>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
