@extends('layouts.app')

@section('title')
    Lista de sócios
@endsection

@section('content')

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nº</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $item)
                <tr>
                    <th scope="row" class="align-middle">{{ $item->number }}</th>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{ $item->email }}</td>
                    <td><img class="thumbnail" src="{{ $item->photo }}" /></td>
                </tr>    
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
    
@endsection