@extends('admin.template.main')

@section('title_content','Crear colaboradores')

@section('content')

	{!! Form::open(['route' => 'admin.contributors.add', 'method' => 'POST']) !!}
		

		<div class="panel panel-primary">
		  <div class="panel-heading">Colaborador</div>
		  <div class="panel-body">
		    <div class="panel  panel-primary">
		  <div class="panel-heading">Información</div>
			  <div class="panel-body">
			  	<div class="form-group">
						{!! Form::label('name','Nombre') !!}		
					{!! Form::text('name',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
						{!! Form::label('first_name','Apellido Paterno') !!}		
					{!! Form::text('first_name',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
						{!! Form::label('last_name','Apellido Materno') !!}		
					{!! Form::text('last_name',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
						{!! Form::label('email_one','Email 1') !!}		
					{!! Form::text('email_one',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
						{!! Form::label('email_two','Email 2') !!}		
					{!! Form::text('email_two',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
						{!! Form::label('tel_one','Teléfono 1') !!}		
					{!! Form::text('tel_one',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
						{!! Form::label('tel_two','Teléfono 2') !!}		
					{!! Form::text('tel_two',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('type','Tipo') !!}		
					{!! Form::select('type', ['interno' => 'Interno', 'externo' => 'Externo'], null, ['class' => 'form-control', 'id' => 'type_member']) !!}
				</div>
			  </div>
			</div>
			
			<!--INFORMACION ADICIONAL-->
			<div id="information-interno" class="panel  panel-primary">
			  <div class="panel-heading">Información adicional colaborador interno</div>
			  <div class="panel-body">
			    
				<div class="form-group">
					{!! Form::label('post','Puesto') !!}		
					{!! Form::text('post',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('level','Nivel') !!}		
					{!! Form::select('level', ['consolidado' => 'Consolidado', 'nivel1' => 'Nivel 1'], null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('index','Indice') !!}		
					{!! Form::text('index',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('sni','SNI') !!}		
					{!! Form::text('sni',null,['class'=>'form-control']) !!}
				</div>
			
			  </div>
			</div>
		    {!! Form::submit('Registrar',['class'=> 'btn btn-info'])  !!}
		  </div>
		</div>

		

	{!! Form::close() !!}
@endsection

@section('js')
 <script src="{{asset('js/functions.js')}}"></script>
@endsection