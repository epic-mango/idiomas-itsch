<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.css') }} " crossorigin="anonymous">
    <!-- BUSQUEDA -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <!-- BUSQUEDA con auto llenado -->
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
    @livewireStyles
</head>

<body class="d-flex flex-column min-vh-100">
    @livewireScripts
    <!--MENU-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SAI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Route::currentRouteName() === 'home' ? 'active' : '' }}">
                        <a class="nav-link" href="/">Noticias<span class="sr-only">(current)</span></a>
                    </li>

                    @can('lv1ylv2')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="true">Personal</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                @can('administrativo')
                                    <a class="dropdown-item {{ Route::currentRouteName() === 'admin.actualizado' ? 'active' : '' }}"
                                        href="/administrativo">Administradores</a>
                                @endcan
                                @can('docente')
                                    <a class="dropdown-item {{ Route::currentRouteName() === 'docente.actualizado' ? 'active' : '' }}"
                                        href="/docente">Docentes</a>
                                @endcan
                                @can('secretaria')
                                    <a class="dropdown-item {{ Route::currentRouteName() === 'secre.actualizado' ? 'active' : '' }}"
                                        href="/secretaria">Secretarias</a>
                                @endcan

                            </div>
                        </li>
                    @endcan

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="true">Alumnado</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            @can('consulta')
                                <a class="dropdown-item {{ Route::currentRouteName() === 'alumno.actualizado' ? 'active' : '' }}"
                                    href="/alumno">Alumnos</a>
                            @endcan

                            @can('cardex2')
                                <a class="dropdown-item" href="/cardex2">Consultar calificaciones</a>
                            @endcan


                            @can('calificaciondocentes')
                                <a class="dropdown-item" href="/docente-calif">Modificar Calificaciones</a>
                            @endcan

                            @can('adeudo')
                                <a class="dropdown-item {{ Route::currentRouteName() === 'adeudo.actualizado' ? 'active' : '' }}"
                                    href="/adeudo">Adeudos</a>
                            @endcan
                        </div>
                    </li>

                    @can('servicios')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                @can('plan-estudio')
                                    <a class="dropdown-item" href="/plan-estudio">Plan de Estudio</a>
                                @endcan
                                @can('modulo')
                                    <a class="dropdown-item" href="/modulo">Modulo</a>
                                @endcan

                                @can('grupo')
                                    <a class="dropdown-item" href="/grupo">Grupo</a>
                                @endcan
                                @can('inscripcion')
                                    <a class="dropdown-item" href="/inscripcion">Inscripcion</a>
                                @endcan
                                @can('calificacion')
                                    <a class="dropdown-item" href="/calificacion2">Calificacion</a>
                                @endcan
                            </div>
                        </li>
                    @endcan



                </ul>

                <div id="app">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none"> @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <!--MENU FIN-->
    <div class="container my-5">
        @yield('contenido-main')
    </div>
    <footer class="bg-light text-center text-lg-start mt-auto">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="">Mango Code Groove</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

    <!-- BUSQUEDA con auto llenado -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- BUSQUEDA -->
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                // "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "Todo"] ]
                "language": {
                    "lengthMenu": "Mostrar " +
                        `<select class= "custom-select custom-select-sm form-control-sm">
                                     <option value = '10' > 10</option>
                                     <option value = '25'> 25</option>
                                     <option value = '50'> 50</option>
                                     <option value = '100'> 100</option>
                                     <option value = '-1'>Todo</option>
                                     </select>` +
                        " registros por página",
                    "zeroRecords": "No hay registros",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No se muestra nada",
                    "infoFiltered": "(filtrado de MAX registros totales)",
                    "search": "Buscar: ",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@master/dist/latest/bootstrap-autocomplete.min.js">
    </script>

</body>

</html>
