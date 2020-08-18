<div class="table-responsive">
    <table class="table" id="personas-table">
        <thead>
            <tr>
                <th>Documento</th>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personas as $personas)
            <tr>
                <td>{{ $personas->documento }}</td>
            <td>{{ $personas->primer_nombre }}</td>
            <td>{{ $personas->segundo_nombre }}</td>
            <td>{{ $personas->primer_apellido }}</td>
            <td>{{ $personas->segundo_apellido }}</td>
                <td>
                    {!! Form::open(['route' => ['personas.destroy', $personas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personas.show', [$personas->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('personas.edit', [$personas->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
