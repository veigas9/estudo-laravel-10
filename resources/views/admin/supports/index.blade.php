<h1>lista de Suportes</h1>

<a href="{{ route('supports.create')}}">Nova Dúvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>status</th>
        <th>Descrição</th>
    </thead>
    <tbody>        
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">ir</a>
                    <a href="{{ route('supports.edit', $support->id) }}">editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>