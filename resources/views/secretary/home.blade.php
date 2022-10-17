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
                    <h5 class="card-title">SEJA BEM VINDO</h5>
                    <p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur dicta recusandae perferendis fuga nihil officiis possimus molestias quisquam non eaque.</p>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
