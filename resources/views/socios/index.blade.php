@extends('layouts.app')

@section('title')
    Lista de sócios
@endsection

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('danger'))
        <div class="alert alert-danger">
            {{ Session::get('danger') }}
        </div>
    @endif
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
                    <th scope="row" class="align-middle">
                        <a href="{{ route('socios.show', ['id' => $item->id]) }}">{{ $item->number }}</a>
                    </th>
                    <td class="align-middle">
                        <a href="{{ route('socios.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                    </td>
                    <td class="align-middle">{{ $item->email }}</td>
                    <td><img class="thumbnail" src="{{ asset('storage/'. $item->photo) }}" /></td>
                </tr>    
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
    
@endsection