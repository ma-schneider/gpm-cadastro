<table>
    <thead>
        <th>
            <td>Nº</td>
            <td>Nome</td>
            <td>E-mail</td>
            <td>Foto</td>
        </th>
    </thead>
    <tbody>
        @foreach ($members as $item)
            <tr>
                <td>{{ $item->number }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->photo }}</td>
            </tr>    
        @endforeach
    </tbody>
</table>