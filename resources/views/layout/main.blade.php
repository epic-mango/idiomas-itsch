<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap-theme.cs"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/font-awesome.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- BUSQUEDA -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">


</head>

<body>


    <!--MENU-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/administrativo">Administrador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/docente">Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/consulta">Alumno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/secretaria">Secretaria</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">

                            <a class="dropdown-item" href="/idioma">Idioma</a>
                            <a class="dropdown-item" href="/modulo">Modulo</a>
                            <a class="dropdown-item" href="/ubicacion">Ubicacion</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lv 1 y Lv 2</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href="/grupo">Grupo</a>
                            <a class="dropdown-item" href="/plan-estudio">Plan de Estudio</a>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lv 3</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href="/inscripcion">Inscripcion</a>
                            <a class="dropdown-item" href="/asistencia">Asistencia</a>
                            <a class="dropdown-item" href="/calificacion">Calificacion</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lv 4</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href="/adeudo">Adeudo</a>
                            <a class="dropdown-item" href="/cardex">Cardex</a>

                        </div>
                    </li>
                </ul>

                <form class="form-inline my-2 my-md-0">

                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            Login
                        </button>

                    </ul>
                </form>

            </div>
        </div>
    </nav>

    <!--MENU FIN-->

    <!--MAIN-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <img src="{{ asset('image/itsch.png') }}" width="100" height="120">
            <center>
                <h3>Cordinacion de Lenguans Extranjeras</h3>
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- BUSQUEDA -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
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
                                     </select>`+ 
                                    " registros por página",
                     "zeroRecords": "No hay registros",
                     "info": "Mostrando la página PAGE de PAGES",
                     "infoEmpty": "No se muestra nada",
                     "infoFiltered": "(filtrado de MAX registros totales)", 
                     "search": "Buscar: ",
                     "paginate": {
                         "next": "Siguiente",
                         "previous": "Anterior"
                     }
                 }
            });
         } );
         
        
    </script>

    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");
      
      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("La contrasena no coincide");
        } else {
          confirm_password.setCustomValidity('');
        }
      }
      
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
    </script>



</body>
</body>

</html>