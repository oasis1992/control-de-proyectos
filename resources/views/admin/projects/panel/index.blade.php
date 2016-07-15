@extends('admin.template.main')

@section('title_content','')

@section('content')

	<h3>Proyecto para el cuidado del medio ambiente</h3>
	<div class="text-right">
		@if($project->status->name == "Vigente")
			<span class="label label-success">{{ $project->status->name }}</span>
		@endif

		@if($project->status->name == "No vigente")
				<span class="label label-warning">{{ $project->status->name }}</span>
		@endif

		@if($project->status->name == "Cancelado")
				<span class="label label-danger">{{ $project->status->name }}</span>
		@endif

		@if($project->status->name == "No aprobado")
			<span class="label label-default">{{ $project->status->name }}</span>
		@endif
		@if($project->status->name == "Concluido")
			<span class="label label-primary">{{ $project->status->name }}</span>
		@endif

	</div>

	<br>

	<div class="section-info-panel">
		<div class="row">
			<div class="col-md-4">
				<div class="panel  panel-default">
					<div class="panel-heading">Colaboradores</div>
					<div class="panel-body">
						@if(count($project->contributors) > 0)
							<a class="btn btn-default" href="{{ route("admin.projects.panel.edit.contributors", $project->id)}}">Editar colaboradores</a>
						@endif
						<br>
						<br>
						<ul class="list-group">
							@if(count($project->contributors) > 0)
								@foreach($project->contributors as $contributor)
									@if($contributor->type == "interno")
										<a id="{{$contributor->id}}" href="#"><li class="list-group-item contributor-master-interno">{{ $contributor->name_complete. " (Interno)" }}</li></a>
									@endif
								@endforeach
								@foreach($project->contributors as $contributor)
									@if($contributor->type == "externo")
										<a id="{{$contributor->id}}" href="#"><li class="list-group-item">{{ $contributor->name_complete }}</li></a>
									@endif
								@endforeach
							@else
								<p>No tienes colaboradores</p>
								<br>
								<a class="btn btn-default" href="{{ route("admin.projects.panel.edit.contributors", $project->id)}}">Agregar colaboradores</a>
							@endif
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel  panel-default">
					<div class="panel-heading">Más información</div>
					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item">Clave: {{ $project->key }}</li>
							<li class="list-group-item">Tipo de proyecto: {{ $project->type_project->name }}</li>
							<li class="list-group-item">Inicio: {{ $project->start_date }}</li>
							<li class="list-group-item project-finally">Fin: {{ $project->end_date }}</li> <!-- en rojo si ya finalizo el proyecto -->
							@foreach($project->extensions as $extension)
								<li class="list-group-item project-finally">Inicio Extension: {{ $extension->startDate }}</li>
								<li class="list-group-item project-finally">Fin Extension: {{ $extension->endDate }}</li>
							@endforeach

						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel  panel-default">
					<div class="panel-heading">Financiamiento</div>
					<div class="panel-body">
						<a class="btn btn-default" href="{{ route("admin.financing.create", $project->id)}}">Nuevo financiamiento</a>
						<br>
						<br>
						<ul class="list-group">
							<li class="list-group-item">Interno: $ {{ $interno }}</li>
							<li class="list-group-item">Externo: $ {{$externo}}</li>
							<li class="list-group-item">Total: ${{ $total }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<ul class="nav nav-tabs nav-justified">
	  <li role="presentation" class="active"><a href="#colaboradores" aria-controls="colaboradores" role="tab" data-toggle="tab">Colaboradores</a></li>
	  <li role="presentation"><a href="#financiamiento" aria-controls="financiamiento" role="tab" data-toggle="tab" class="@if(count($project->extensions) > 0))green-extension @endif">Financiamiento</a></li>  <!-- Verde si es que contiene extension -->
	  <li role="presentation"><a href="#resultados" aria-controls="resultados" role="tab" data-toggle="tab">Resultados</a></li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="colaboradores">
			<br>
			<br>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th data-field="id">ID</th>
					<th data-field="name">Nombres</th>
					<th data-field="name">Apellidos</th>
					<th data-field="name">Email 1</th>
					<th data-field="name">Email 2</th>
					<th data-field="name">Telefono 1</th>
					<th data-field="name">telefono 2</th>
					<th data-field="name">Tipo</th>
					<th data-field="name">Acciones</th>
				</tr>

				<tbody>
					@if(count($project->contributors) > 0)
						@foreach($project->contributors as $contributor)
							<tr>
								<td>{{ $contributor->id }}</td>
								<td>{{ $contributor->first_name }}</td>
								<td>{{ $contributor->last_name }}</td>
								<td>{{ $contributor->email_one }}</td>
								<td>{{ $contributor->email_two }}</td>
								<td>{{ $contributor->tel_one }}</td>
								<td>{{ $contributor->tel_two }}</td>
								<td>{{ $contributor->type }}</td>
								<td>
									<a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
									{{--<a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route('admin.contributor.destroy.panel', ['id' => $contributor->id, 'project_id' => $project->id]) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>--}}
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>
								<h3>No hay colaboradores</h3>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					@endif
				</tbody>
				</thead>
			</table>
		</div>
		<div role="tabpanel" class="tab-pane" id="financiamiento">
			{{--financiamiento--}}
			<br>
			<br>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th data-field="id">ID</th>
					<th data-field="name">Nombre</th>
					<th data-field="name">Monto</th>
					<th data-field="name">Institución</th>
					<th data-field="name">Tipo</th>
				</tr>

				<tbody>
				@if(count($project->financings) > 0)
					@foreach($project->financings as $financing)
						<tr>
							<td>{{ $financing->id }}</td>
							<td>{{ $financing->name }}</td>
							<td>{{ $financing->mount }}</td>
							<td>{{ $financing->institution->name }}</td>
							<td>{{ $financing->institution->type }}</td>
							<td>
								<a class="" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
								<a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route("admin.financing.destroy", ['id'=> $financing->id, 'project_id'=> $project->id]) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td>
							<h3>No hay Financiamientos</h3>
						</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				@endif
				</tbody>
				</thead>
			</table>
			{{--endFinanciamiento--}}


		</div>
		<div role="tabpanel" class="tab-pane" id="resultados">Resultados</div>
		<div role="tabpanel" class="tab-pane" id="settings">...</div>
	</div>


@endsection