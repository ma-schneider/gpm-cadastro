@extends('layouts.app')

@section('title')
    Dados do sócio    
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="media">
                <img class="img-thumbnail" src="{{ asset('storage/' . $user->photo) }}" class="mr-3 img-thumbnail rounded" alt="Foto do sócio">
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

    <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#remove-user" dusk="remove-user">
        Remover Sócio
    </button>

    <div class="modal fade" id="remove-user" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationLabel">Remover Sócio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Deseja Realmente remover o cadastro do sócio {{ $user->name }}?</b></p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('socios.destroy', ['id' => $user->id]) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" dusk="confirmation">Remover Sócio</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection