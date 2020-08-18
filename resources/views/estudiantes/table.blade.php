<div class="table-responsive">
    <table class="table" id="estudiantes-table">
        <thead>
            <tr>
                <th>Persona Id</th>
        <th>Codigo</th>
        <th>Grado</th>
        <th>Eps</th>
        <th>Cupo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estudiantes as $estudiantes)
            <tr>
                <td>{{ $estudiantes->persona_id }}</td>
            <td>{{ $estudiantes->codigo }}</td>
            <td>{{ $estudiantes->grado }}</td>
            <td>{{ $estudiantes->eps }}</td>
            <td>{{ $estudiantes->cupo }}</td>
                <td>
                    {!! Form::open(['route' => ['estudiantes.destroy', $estudiantes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estudiantes.show', [$estudiantes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('estudiantes.edit', [$estudiantes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
