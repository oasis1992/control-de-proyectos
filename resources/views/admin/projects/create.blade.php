@extends('admin.template.main')

@section('title_content','Crear proyecto')

@section('content')

	{!! Form::open(['route' => 'admin.proyectos.store', 'method' => 'POST']) !!}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="panel panel-primary">
		  <div class="panel-heading">Proyecto</div>
		  <div class="panel-body">
		  	<div class="form-group">
					{!! Form::label('title','Titulo') !!}		
				{!! Form::text('title',null,['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
					{!! Form::label('key','Clave') !!}		
				{!! Form::text('key',null,['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{{ Form::label('', '')}}
				{{ Form::label('fecha_limit', 'Fecha inicio:')}}
				{{Form::selectRange('day', 1,31, date('d'),['id'=>'day','onchange'=>'update_startDate(event,this)'])}}
				{{Form::selectMonth('month',date('m'),['id'=>'month','onchange'=>'update_startDate(event,this)'])}}
				{{Form::selectYear('year',2015,2050, date('Y'),['id'=>'year','onchange'=>'update_startDate(event,this)'])}}
				{{ $errors->first('start_date','<div class="alert-danger">:message</div>') }}
				{{ Form::hidden('start_date', date('Y/m/d'), array('id' => 'date_limit_hidden')) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('', '')}}
				{{ Form::label('fecha_inicio', 'Fecha de término:')}}
				{{Form::selectRange('day2', 1,31, date('d'),['id'=>'day2','onchange'=>'update_endDate(event,this)'])}}
				{{Form::selectMonth('month2', date('m'),['id'=>'month2','onchange'=>'update_endDate(event,this)'])}}
				{{Form::selectYear('year2',2015,2050, date('Y'),['id'=>'year2','onchange'=>'update_endDate(event,this)'])}}
				{{ $errors->first('end_date','<div class="alert-danger">:message</div>') }}
				
				{{ Form::hidden('end_date', date('Y/m/d'), array('id' => 'date_start_hidden')) }}
			</div>

			<div class="form-group">
				{!! Form::label('type_project_id', 'Tipo de proyecto') !!}
				{!! Form::select('type_project_id', $type_project, null, ['class'=>'form-control']) !!} 
			</div>

			<div class="form-group">
				{!! Form::label('status_id', 'Estado del proyecto') !!}
				{!! Form::select('status_id', $status, null, ['class'=>'form-control']) !!} 
			</div>

			{!! Form::submit('Registrar',['class'=> 'btn btn-info'])  !!}
		  </div>
		</div>
	
	

	{!! Form::close() !!}
@endsection

@section('js')
 <script src="{{asset('js/functions.js')}}"></script>
@endsection