<!-- Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('persona_id', 'Persona Id:') !!}
    {!! Form::text('persona_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado', 'Grado:') !!}
    {!! Form::text('grado', null, ['class' => 'form-control']) !!}
</div>

<!-- Eps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eps', 'Eps:') !!}
    {!! Form::text('eps', null, ['class' => 'form-control']) !!}
</div>

<!-- Cupo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cupo', 'Cupo:') !!}
    {!! Form::text('cupo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('estudiantes.index') }}" class="btn btn-default">Cancel</a>
</div>
