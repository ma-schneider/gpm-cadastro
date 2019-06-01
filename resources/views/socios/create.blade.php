@extends('layouts.app')

@section('title')
    Cadastro
@endsection

@section('content')
    <form action="{{ route('socios.store') }}" method="POST">

        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" type="text" name="email">
        </div>
        <div class="form-group">
            <label for="email-verified-at">Confirmação do e-mail</label>
            <input class="form-control" type="text" id="email-verified-at" name="email_verified_at">    
        </div>
        <div class="form-group">
            <label for="number">Número de sócio</label>
            <input class="form-control" type="text" id="number" name="number">    
        </div>
        <div class="form-group">
            <label for="photo">Foto</label>
            <input class="form-control" type="text" id="photo" name="photo">    
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" id="password" name="password">    
        </div>

        <button class="btn btn-primary" type="submit" dusk="register">Cadastrar</button>
    </form>
@endsection