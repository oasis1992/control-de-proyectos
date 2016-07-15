@extends('admin.template.main')

@section('title_content','Agregar miembros')

@section('content')

	{!! Form::open(['route' => 'admin.projects.panel.update.contributors', 'method' => 'POST']) !!}
		<br>
		<br>
		<input type="hidden" name="project_id" value="{{ $project->id }}"></input>
		<div class="input-field col s6">
			{!! Form::label('contributor_internos', 'Colaboradores internos') !!}
            {!! Form::select('contributors[]', $contributors_internos, $my_contributors_internos, ['multiple', 'required', 'class'=>'select']) !!}
        </div>
        <br>
		<br>

		<div class="input-field col s6">
			{!! Form::label('contributor_externos', 'Colaboradores externos') !!}
            {!! Form::select('contributors[]', $contributors_externos, $my_contributors_externos, ['multiple', 'required', 'class'=>'select2']) !!}
        </div>

		{!! Form::submit('Agregar',['class'=> 'btn btn-info'])  !!}

	{!! Form::close() !!}
@endsection

@section('js')
 <script src="{{asset('js/functions.js')}}"></script>

 <script>
	$( document ).ready(function() {
		$('.select').chosen();
		$('.select2').chosen();
	});
 </script>
@endsection