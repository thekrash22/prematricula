@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estudiante Acuente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estudianteAcuente, ['route' => ['estudianteAcuentes.update', $estudianteAcuente->id], 'method' => 'patch']) !!}

                        @include('estudiante_acuentes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection