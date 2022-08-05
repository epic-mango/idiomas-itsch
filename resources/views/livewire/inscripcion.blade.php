<div>
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
                                    {{-- Si el alumno está siendo inscrito, se mostrará este form --}}
                                    <form>
                                        <h5 class="text-center">Inscripción a {{ $inscribiendo['idioma'] }}
                                            M{{ $inscribiendo['numeroModulo'] }}</h5>


                                        {{-- Número de folio --}}
                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <input type="number" wire:model="inscribiendo.folio"
                                                    class="form-control" placeholder="Número de folio" />
                                                @error('inscribiendo.folio')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Cantidad --}}
                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="Cantidad"
                                                        wire:model="inscribiendo.cantidad" />


                                                </div>
                                                @error('inscribiendo.cantidad')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Grupos --}}
                                        <div class="form-row mb-3">
                                            <div class="col">
                                                <select class="custom-select" aria-placeholder="Grupo"
                                                    wire:model="inscribiendo.idGrupo">
                                                    <option selected hidden>Grupo</option>

                                                    @foreach ($planesEstudio as $idPlan => $datosPlanEstudio)
                                                        @if ($idPlan === $inscribiendo['planEstudio'])
                                                            @foreach ($datosPlanEstudio['modulos'] as $idModulo => $datosModulo)
                                                                @if (str_replace($idPlan . '_M', '', $idModulo) === $inscribiendo['numeroModulo'])
                                                                    @foreach ($datosModulo['grupos'] as $grupo)
                                                                        @if ($grupo['GRUPO_NUM_ALUMNOS'] < $grupo['GRUPO_LIMITE'])
                                                                            <option value="{{ $grupo['ID_GRUPO'] }}">
                                                                                {{ $grupo['ID_GRUPO'] }}
                                                                                {{ $grupo['GRUPO_TIPO'] }}
                                                                                ({{ $grupo['GRUPO_NUM_ALUMNOS'] }}/{{ $grupo['GRUPO_LIMITE'] }})
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('inscribiendo.idGrupo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Botones --}}
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-success mx-1"
                                                wire:click="inscribir">Inscribir</button>
                                            <button type="button" class="btn btn-secondary mx-1"
                                                wire:click="cancelarInscripcion">Cancelar</button>
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
                                                wire:click="llenarInscripcion('{{ $alumno['id'] }}','{{ $idPlan }}','{{ $alumno['ultimoModulo']["$idPlan"]['modulo'] + 1 }}')">
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
