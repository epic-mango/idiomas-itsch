<div>
    <!--PARA QUE SALGA-->
    <div class="container">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h5>Inscripciones</h5>
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
                    <th scope="col">Inscripciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($listaAlumnos as $alumno)
                    @if ($alumno['tipo'] == 'alumno')
                        <tr>
                            <th>{{ $alumno['id'] }}</th>
                            <td>{{ $alumno['nombre'] }}</td>

                            @if ($inscribiendo['id'] == $alumno['id'])
                                <td>
                                    <form>
                                        <h5 class="text-center">Inscripción a {{$inscribiendo['id']}}</h5>
                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <input type="text" wire:model="inscribiendo.folio"
                                                    class="form-control" placeholder="Número de folio">
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Cantidad">

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            @else
                                <td>
                                    @foreach ($planesEstudio as $idPlan => $contenido)
                                        @if (isset($alumno['grupos']["$idPlan"]))
                                            {{-- Existe el grupo, entonces está inscrito a él --}}
                                            <button type="button" class="btn btn-secondary">
                                                {{ $contenido['idioma'] }}</button>
                                        @elseif (isset($alumno['ultimoModulo']["$idPlan"]))
                                            {{-- Si no está inscrito a ningún grupo, pero tiene antecedentes en el idioma --}}
                                            <button type="button" class="btn btn-success"
                                                wire:click="inscribir('{{ $alumno['id'] }}')">
                                                {{ $contenido['idioma'] }}
                                                M{{ $alumno['ultimoModulo']["$idPlan"]['modulo'] + 1 }}</button>
                                        @else
                                            {{-- No tiene antecedentes en el idioma --}}
                                            <button type="button" class="btn btn-primary">
                                                {{ $contenido['idioma'] }}</button>
                                        @endif
                                    @endforeach
                                </td>
                            @endif

                        </tr>
                    @else
                        {{-- No está registrado --}}
                        <tr>
                            <th></th>
                            <td>{{ $alumno->name . ' - ' . $alumno->email }}</td>
                            <td><button type="button" class="btn btn-primary">Registrar</button></td>

                        </tr>
                    @endif
                @endforeach



            </tbody>
        </table>
        <div class="container m-1">
            <div class="row">
                <div class="col-6">
                    {{ $alumnosPaginado->links() }}
                </div>

            </div>
        </div>

    </div>

</div>
