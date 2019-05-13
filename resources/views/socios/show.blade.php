@extends('layouts.app')

@section('title')
    Dados do sócio    
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="media">
                <img src="{{ $user->photo }}" class="mr-3 img-thumbnail rounded" alt="Foto do sócio">
                <div class="media-body">
                    <b><h3 class="mt-0">{{ $user->name }}</h3></b>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h4>Número de sócio:</h4></li>
                <li class="list-group-item"><h4>E-mail:</h4></li>
                <li class="list-group-item"><h4>Conta atualizado em:</h4></li>
                <li class="list-group-item"><h4>Conta criada em:</h4></li>
            </ul>
        </div>
        <div class="col-sm-8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h4>{{ $user->number }}</h4></li>
                <li class="list-group-item"><h4>{{ $user->email }}</h4></li>
                <li class="list-group-item"><h4>{{ $user->updated_at }}</h4></li>
                <li class="list-group-item"><h4>{{ $user->created_at }}</h4></li>
            </ul>
        </div>
    </div>

    <form method="POST" action="{{ route('socios.destroy', ['id' => $user->id]) }}">
        @csrf
        @method('delete')
        <button class="btn btn-danger float-right" type="submit" dusk="delete">Deletar</button>
    </form>
    
@endsection