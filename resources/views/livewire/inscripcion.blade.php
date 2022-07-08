<div>
    <!--PARA QUE SALGA-->
    <div class="container">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">

                <div class="container m-1">
                    <div class="row">
                        <div class="col">
                            <h5>Consulta de Inscripción</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <select wire:model="cantidadRegistros" class="form-control">
                                <option value=1>1</option>
                                <option value=10>10</option>
                                <option value=20>20</option>
                                <option value=50>50</option>
                                <option value=100>100</option>
                            </select>
                            
                        </div>
                        <div class="col-3"><p>registros por página.</p></div>

                        <div class="col-3 offset-4">
                            <input class="mr-sm-2 form-control " wire:model.debounce="busqueda" type="search"
                                placeholder="Búsqueda" aria-label="Search">
                        </div>
                    </div>
                </div>

                {{-- Tabla --}}
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Último módulo - Calificación</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Número de folio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaAlumnos as $alumno)
                            <tr>
                                <th>{{ $alumno->ID_ALUMNO }}</th>
                                <td>{{ $alumno->ALUMNO_NOMBRE . ' ' . $alumno->ALUMNO_APELLIDO_PAT . ' ' . $alumno->ALUMNO_APELLIDO_MAT }}
                                </td>
                                <td>{{ $alumno['modulo'] . ' - ' . $alumno['calificacion'] }}</td>
                                <td>{{ $alumno['grupo'] }}</td>
                                <td>{{ $alumno['folio'] }}</td>
                                <td>{{ $alumno['cantidad'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="container m-1">
                    <div class="row">
                        <div class="col-6">
                            {{ $listaAlumnos->links() }}
                        </div>

                    </div>
                </div>

            </li>
        </ul>
    </div>
</div>
