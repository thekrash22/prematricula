<div class="table-responsive">
    <table class="table" id="acudientes-table">
        <thead>
            <tr>
                <th>Persona Id</th>
        <th>Direccion</th>
        <th>Barrio</th>
        <th>Profesion</th>
        <th>Correo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($acudientes as $acudientes)
            <tr>
                <td>{{ $acudientes->persona_id }}</td>
            <td>{{ $acudientes->direccion }}</td>
            <td>{{ $acudientes->barrio }}</td>
            <td>{{ $acudientes->profesion }}</td>
            <td>{{ $acudientes->correo }}</td>
                <td>
                    {!! Form::open(['route' => ['acudientes.destroy', $acudientes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('acudientes.show', [$acudientes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('acudientes.edit', [$acudientes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
