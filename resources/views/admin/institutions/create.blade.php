@extends('admin.template.main')

@section('title_content','Crear institucion')

@section('content')
    {!! Form::open(['route' => 'admin.institution.store', 'method' => 'POST']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            {!! Form::label('name','Nombre institucion') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type_id', 'Tipo de financiamiento') !!}
            {!! Form::select('type_id', array('interno' => 'Interno', 'externo' => 'Externo'), null, ['class'=>'form-control']) !!}
        </div>

    {!! Form::submit('Registrar',['class'=> 'btn btn-info'])  !!}
    {!! Form::close() !!}
@endsection