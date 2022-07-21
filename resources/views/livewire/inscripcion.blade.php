<div>
    <!--PARA QUE SALGA-->
    <div class="container">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h5>Alumnos registrados</h5>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-2">
                    <select wire:model="cantidadRegistros" class="form-control">
                        <option value=1>1</option>
                        <option value=10>10</option>
                        <option value=20>20</option>
                        <option value=50>50</option>
                        <option value=100>100</option>
                    </select>

                </div>
                <div class="col-3">
                    <p>registros por página.</p>
                </div>

                <div class="col-5 offset-2">
                    <input class="mr-sm-2 form-control " wire:model.debounce.500ms="busqueda" type="search"
                        placeholder="Búsqueda por nombre, correo o número de control." aria-label="Search">
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
                </tr>
            </thead>
            <tbody>

                @foreach ($listaAlumnos as $alumno)
                    @if ($alumno->getTable() == 'alumnos')
                        <tr>
                            <th>{{ $alumno->ID_ALUMNO }}</th>
                            <td>{{ $alumno->ALUMNO_NOMBRE . ' ' . $alumno->ALUMNO_APELLIDO_PAT . ' ' . $alumno->ALUMNO_APELLIDO_MAT }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @else
                        <tr>
                            <th></th>
                            <td>{{ $alumno->name . ' - ' . $alumno->email }}
                            </td>
                            <td><button type="button" class="btn btn-primary">Registrar</button></td>
                            <td></td>
                        </tr>
                    @endif
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

    </div>

</div>
