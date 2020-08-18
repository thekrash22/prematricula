<!-- Persona Id Field -->
<div class="form-group">
    {!! Form::label('persona_id', 'Persona Id:') !!}
    <p>{{ $acudientes->persona_id }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $acudientes->direccion }}</p>
</div>

<!-- Barrio Field -->
<div class="form-group">
    {!! Form::label('barrio', 'Barrio:') !!}
    <p>{{ $acudientes->barrio }}</p>
</div>

<!-- Profesion Field -->
<div class="form-group">
    {!! Form::label('profesion', 'Profesion:') !!}
    <p>{{ $acudientes->profesion }}</p>
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $acudientes->correo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $acudientes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $acudientes->updated_at }}</p>
</div>

