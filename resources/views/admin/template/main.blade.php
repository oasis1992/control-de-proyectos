<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Titulo de la web</title>
<meta charset="utf-8" />
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/chosen/css/chosen.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    <header>
        @include('admin.template.partials.nav')
    </header>
    <section>
        <div class="container">
               <h3>@yield('title_content','')</h3>
            @include('admin.template.partials.errors')
            @include('flash::message')
            @yield('content')
        </div>
    </section>

    <script src="{{asset('plugins/jquery-1.12.1.js')}}"></script>
    <script src="{{asset('plugins/chosen/js/jquery-chosen.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    @yield('js')
</body>
</html>