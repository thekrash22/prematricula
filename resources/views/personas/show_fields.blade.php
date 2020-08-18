<!-- Documento Field -->
<div class="form-group">
    {!! Form::label('documento', 'Documento:') !!}
    <p>{{ $personas->documento }}</p>
</div>

<!-- Primer Nombre Field -->
<div class="form-group">
    {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
    <p>{{ $personas->primer_nombre }}</p>
</div>

<!-- Segundo Nombre Field -->
<div class="form-group">
    {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
    <p>{{ $personas->segundo_nombre }}</p>
</div>

<!-- Primer Apellido Field -->
<div class="form-group">
    {!! Form::label('primer_apellido', 'Primer Apellido:') !!}
    <p>{{ $personas->primer_apellido }}</p>
</div>

<!-- Segundo Apellido Field -->
<div class="form-group">
    {!! Form::label('segundo_apellido', 'Segundo Apellido:') !!}
    <p>{{ $personas->segundo_apellido }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $personas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $personas->updated_at }}</p>
</div>

