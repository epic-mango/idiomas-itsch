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

<body>
    @livewireScripts
    <!--MENU-->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SAI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    @can('administrativo')
                        <li class="nav-item">
                            <a class="nav-link" href="/administrativo">Administrador</a>
                        </li>
                    @endcan
                    @can('docente')
                        <li class="nav-item">
                            <a class="nav-link" href="/docente">Docente</a>
                        </li>
                    @endcan
                    @can('consulta')
                        <li class="nav-item">
                            <a class="nav-link " href="/consulta">Alumno</a>
                        </li>
                    @endcan
                    @can('secretaria')
                        <li class="nav-item">
                            <a class="nav-link " href="/secretaria">Secretaria</a>
                        </li>
                    @endcan

                    @can('calificaciondocentes')
                        <li class="nav-item">
                            <a class="nav-link " href="/docente-calif">Calificaciones</a>
                        </li>
                    @endcan
                    @can('servicios')


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">

                                @can('modulo')
                                    <a class="dropdown-item" href="/modulo">Modulo</a>
                                @endcan

                            </div>
                        </li>
                    @endcan
                    @can('lv1ylv2')


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="true">lv1 y 2</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                @can('grupo')
                                    <a class="dropdown-item" href="/grupo">Grupo</a>
                                @endcan
                                @can('plan-estudio')
                                    <a class="dropdown-item" href="/plan-estudio">Plan de Estudio</a>
                                @endcan
                            </div>
                        </li>
                    @endcan
                    @can('lv3')

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lv 3</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                @can('inscripcion')
                                    <a class="dropdown-item" href="/inscripcion">Inscripcion</a>
                                @endcan

                                @can('calificacion')
                                    <a class="dropdown-item" href="/calificacion2">Calificacion</a>
                                @endcan


                            </div>
                        </li>
                    @endcan
                    @can('lv4')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lv 4</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                @can('adeudo')
                                    <a class="dropdown-item" href="/adeudo">Adeudo</a>
                                @endcan
                                @can('cardex2')
                                    <a class="dropdown-item" href="/cardex2">Cardex</a>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
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

    <!--MAIN-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <img src="{{ asset('image/itsch.png') }}" width="100" height="120">
            <center>
                <h3>Coordinacion de Lenguas Extranjeras</h3>
            </center>
        </div>
    </div>

    <!--MAIN FIN-->

    @yield('contenido-main')

    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous">
    </script>

    <!-- BUSQUEDA con auto llenado -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- BUSQUEDA -->
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous">
    </script>
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
    <!-- BUSQUEDAS EN IMPUTS -->
    <script>
        $('#buscaremail').autoComplete({
            resolverSettings: {
                url: '/busquedas',
            }
        });
    </script>





</body>
</body>

</html>
