<!-- Persona Id Field -->
<div class="form-group">
    {!! Form::label('persona_id', 'Persona Id:') !!}
    <p>{{ $estudiantes->persona_id }}</p>
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:') !!}
    <p>{{ $estudiantes->codigo }}</p>
</div>

<!-- Grado Field -->
<div class="form-group">
    {!! Form::label('grado', 'Grado:') !!}
    <p>{{ $estudiantes->grado }}</p>
</div>

<!-- Eps Field -->
<div class="form-group">
    {!! Form::label('eps', 'Eps:') !!}
    <p>{{ $estudiantes->eps }}</p>
</div>

<!-- Cupo Field -->
<div class="form-group">
    {!! Form::label('cupo', 'Cupo:') !!}
    <p>{{ $estudiantes->cupo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $estudiantes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $estudiantes->updated_at }}</p>
</div>

