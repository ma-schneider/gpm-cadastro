@extends('layouts.app')

@section('title')
    Atualizar Cadastro
@endsection

@section('content')
    
    <form action="{{ route('socios.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')
        
        @include('forms.user')
        
        <button class="btn btn-primary" type="submit" dusk="update">Atualizar</button>
    </form>

@endsection