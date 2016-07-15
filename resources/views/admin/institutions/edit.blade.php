@extends('admin.template.main')

@section('title_content','Editar institucion '.$institution->name)

@section('content')
    {!! Form::open(['route' => ['admin.institution.update', $institution->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name','Nombre institucion') !!}
        {!! Form::text('name', $institution->name,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type_id', 'Tipo de financiamiento') !!}
        {!! Form::select('type_id', array('interno' => 'Interno', 'externo' => 'Externo'), null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Registrar',['class'=> 'btn btn-info'])  !!}
    {!! Form::close() !!}
@endsection