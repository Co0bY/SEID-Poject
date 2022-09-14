@extends('layouts.app')

@section('content')
    <login-component token_csrf="{{@csrf_token()}}" rota_home="{{route('home')}}"> </login-component>
@endsection
