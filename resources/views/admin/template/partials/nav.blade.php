<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">UADY</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('admin.proyectos.index') }}">Proyectos <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ route('admin.colaboradores.index') }}">Colaboradores</a></li>
        <li><a href="{{ route('admin.institution.index') }}">Instituciones</a></li>
        <!--
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        -->
      </ul>

      {!! Form::open(['route'=>'admin.proyectos.index', 'method' => 'GET','class'=> 'navbar-form navbar-left','role'=>'search'])!!}
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Buscar">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
      {!! Form::close() !!}

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">@if(Auth::check()) {{ Auth::user()->email }}@else Inicia sesión @endif</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@if(Auth::check()) {{ Auth::user()->name }}@else Inicia sesión @endif<span class="caret"></span></a>
          <ul class="dropdown-menu">
               @if (Auth::check())
                    <li><a href="#" >{{ Auth::user()->email }} </a> </li>
                    <li><a href="{{ route('logout') }}"></i>Cerrar sesión</a></li>
                 @else
                    <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li><a href="">Register</a></li>
                @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>