@extends('admin.template.main')

@section('title_content','Lista de Instituciones')

@section('content')
    <a href="{{route('admin.institution.create')}}"><button class="btn btn-success">Nueva Institucion</button></a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th data-field="id">ID</th>
            <th data-field="name">Nombre</th>
            <th data-field="name">Tipo</th>
        </tr>

        <tbody>
        @foreach($institutions as $institution)
            <tr>
                <td>{{ $institution->id }}</td>
                <td>{{ $institution->name }}</td>
                <td>{{ $institution->type }}</td>
                <td>
                    <a class="" href="{{ route('admin.institution.edit', $institution->id) }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                    <a class="" onclick="return confirm('¿Seguro que desea eliminarlo?')" href="{{ route('admin.institution.destroy', $institution->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
@endsection