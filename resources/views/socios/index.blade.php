<table>
    <thead>
        <tr>
            <th>Nº</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $item)
            <tr>
                <td>{{ $item->number }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td><img src="{{ $item->photo }}" /></td>
            </tr>    
        @endforeach
    </tbody>
</table>