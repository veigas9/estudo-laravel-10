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
                    >
                </td>
            </tr>
        @endforeach
    </tbody>
</table>