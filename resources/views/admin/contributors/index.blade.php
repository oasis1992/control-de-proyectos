@extends('admin.template.main')

@section('title_content','Lista de Colaboradores')

@section('content')
	<a href="{{route('admin.colaboradores.create')}}"><button class="btn btn-success">Nuevo Colaborador</button></a>
	<br>
	<br>
	<table class="table table-bordered">
  		<thead>
             <tr>
                 <th data-field="id">ID</th>
                 <th data-field="name">Nombre</th>
                 <th data-field="name">Correo 1</th>
                 <th data-field="name">Correo 2</th>
                 <th data-field="name">Telefono 1</th>
                 <th data-field="name">Telefono 2</th>
                 <th data-field="name">Tipo</th>
                 <th data-field="name">Creado en</th>
                 <th data-field="name">Actualizado en</th>
                 <th data-field="name">Acciones</th>
             </tr>

             <tbody>
	               @foreach($contributors as $contributor)
	                   <tr>
	                       <td>{{ $contributor->id }}</td>
	                       <td>{{ $contributor->name_complete }}</td>
	                       <td>{{ $contributor->email_one }}</td>
	                       <td>{{ $contributor->email_two }}</td>
	                       <td>{{ $contributor->tel_one }}</td>
	                       <td>{{ $contributor->tel_two }}</td>
	                       <td>{{ $contributor->type }}</td>
	                       <td>{{ $contributor->created_at }}</td>
	                       <td>{{ $contributor->updated_at }}</td>
	                       <td>
	                       
	                       		<a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route('admin.contributors.destroy', $contributor->id) }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
	                           <a class="" href="{{ route('admin.colaboradores.edit', $contributor->id) }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
	                           <a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route('admin.contributors.destroy', $contributor->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
	                       </td>
	                   </tr>
	               @endforeach
	        </tbody>
	   	</thead>
	</table>
@endsection
