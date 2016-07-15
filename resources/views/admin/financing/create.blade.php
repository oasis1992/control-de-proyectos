@extends('admin.template.main')

@section('title_content','Crear financiamiento para proyecto '. $project->title)

@section('content')
    {!! Form::open(['route' => 'admin.financing.store', 'method' => 'POST']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="project_id" value="{{ $project->id }}">
    <div class="form-group">
        {!! Form::label('name','Nombre financiamiento') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mount','Monto') !!}
        {!! Form::text('mount',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('institution_id', 'Institución') !!}
        {!! Form::select('institution_id', $institutions, null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Registrar',['class'=> 'btn btn-info'])  !!}
    {!! Form::close() !!}
@endsection