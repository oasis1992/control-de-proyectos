@extends('admin.template.main')

@section('title_content','Lista de Proyectos')

@section('content')
	<a href="{{route('admin.proyectos.create')}}"><button class="btn btn-success">Nuevo Proyecto</button></a>
	<h2 class="text-center">{{ count($projects) }} proyectos</h2>
	<br>
	<br>

	<table class="table table-bordered">
  		<thead>
             <tr>
                 <th data-field="id">ID</th>
                 <th data-field="name">Titulo</th>
                 <th data-field="name">Clave</th>
                 <th data-field="name">Encargado</th>
                 <th data-field="name">Fecha inicio</th>
                 <th data-field="name">Fecha fin</th>
                 <th data-field="name">Tipo</th>
                 <th data-field="name">Estado</th>
                 <th data-field="name">Creado en</th>
                 <th data-field="name">Actualizado en</th>
                 <th data-field="name">Acciones</th>
             </tr>

             <tbody>
	               @foreach($projects as $project)
	                   <tr>
	                       <td>{{ $project->id }}</td>
	                       <td>{{ $project->title }}</td>
	                       <td>{{ $project->key }}</td>
	                       <td></td>
	                       <td>{{ $project->start_date }}</td>
	                       <td>{{ $project->end_date }}</td>
	                       <td>{{ $project->type_project->name }}</td>
	                       <td>{{ $project->status->name }}</td>
	                       <td>{{ $project->created_at }}</td>
	                       <td>{{ $project->updated_at }}</td>
	                       <td>
	                       		<a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route('admin.projects.destroy', $project->id) }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
	                           <a class="" href="{{ route('admin.projects.panel', $project->id) }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
	                           <a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route('admin.projects.destroy', $project->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
	                       </td>
	                   </tr>
	               @endforeach
	        </tbody>
	   	</thead>
	</table>

	{!! $projects->render() !!}
@endsection
