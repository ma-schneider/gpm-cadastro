@extends('layouts.app')

@section('title')
    Cadastro
@endsection

@section('content')
    <form action="{{ route('socios.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('POST')

            @include('forms.user')

        <button class="btn btn-primary" type="submit" dusk="register">Cadastrar</button>
    </form>
@endsection