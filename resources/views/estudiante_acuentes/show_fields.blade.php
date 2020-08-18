<!-- Estudiante Id Field -->
<div class="form-group">
    {!! Form::label('estudiante_id', 'Estudiante Id:') !!}
    <p>{{ $estudianteAcuente->estudiante_id }}</p>
</div>

<!-- Acudiente Id Field -->
<div class="form-group">
    {!! Form::label('acudiente_id', 'Acudiente Id:') !!}
    <p>{{ $estudianteAcuente->acudiente_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $estudianteAcuente->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $estudianteAcuente->updated_at }}</p>
</div>

