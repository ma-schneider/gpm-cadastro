@extends('layouts.app')

<p>{{ $user->id }}</p>
<p>{{ $user->name }}</p>
<p>{{ $user->photo }}</p>
<p>{{ $user->email }}</p>
<p>{{ $user->number }}</p>
<p>{{ $user->created_at }}</p>
<p>{{ $user->updated_at }}</p>

<form method="POST" action="{{ route('socios.destroy', ['id' => $user->id]) }}">
    @csrf
    @method('delete')
    
    <button type="submit" dusk="delete">Deletar</button>

</form>