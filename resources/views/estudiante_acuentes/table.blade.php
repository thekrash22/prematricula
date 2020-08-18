<div class="table-responsive">
    <table class="table" id="estudianteAcuentes-table">
        <thead>
            <tr>
                <th>Estudiante Id</th>
        <th>Acudiente Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estudianteAcuentes as $estudianteAcuente)
            <tr>
                <td>{{ $estudianteAcuente->estudiante_id }}</td>
            <td>{{ $estudianteAcuente->acudiente_id }}</td>
                <td>
                    {!! Form::open(['route' => ['estudianteAcuentes.destroy', $estudianteAcuente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estudianteAcuentes.show', [$estudianteAcuente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('estudianteAcuentes.edit', [$estudianteAcuente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
