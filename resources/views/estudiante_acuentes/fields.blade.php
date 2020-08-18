<!-- Estudiante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiante_id', 'Estudiante Id:') !!}
    {!! Form::text('estudiante_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Acudiente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acudiente_id', 'Acudiente Id:') !!}
    {!! Form::text('acudiente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('estudianteAcuentes.index') }}" class="btn btn-default">Cancel</a>
</div>
