<div>


    <div class="container">
        <div class="col-sm">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Grupos:</label>
                <select class="form-control  form-control-sm" name="DOCENTE_SEXO" id="exampleFormControlSelect1"
                    wire:model="grupo">

                    @foreach ($listaGrupos as $grupo)
                        <option value="{{ $grupo->ID_GRUPO }}">{{ $grupo->ID_GRUPO }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <div class="table-responsive-xl container">
        <form wire:submit.prevent="enviarCalificaciones">

            <table id="example" class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Matricula</th>
                        <th scope="col">Unidad 1</th>
                        <th scope="col">Unidad 2</th>
                        <th scope="col">Unidad 3</th>
                        <th scope="col">Unidad 4</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($listaAlumnos as $alumno)
                        <tr>
                            <th scope="row">{{ $alumno->ALUMNO_NOMBRE }} {{ $alumno->ALUMNO_APELLIDO_PAT }}
                                {{ $alumno->ALUMNO_APELLIDO_MAT }}</th>
                            <td>{{ $alumno->ID_ALUMNO }}</td>
                            <td><input wire:model="listaCalificaciones.{{ $alumno->ID_ALUMNO }}.P1"
                                    name="{{ $alumno->ID_ALUMNO }}-P1" type="number" maxlength="30"
                                    class="form-control form-control-sm" required>
                                @error('listaCalificaciones.' . $alumno->ID_ALUMNO . '.P1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td><input wire:model="listaCalificaciones.{{ $alumno->ID_ALUMNO }}.P2"
                                    name="{{ $alumno->ID_ALUMNO }}-P2" type="number" maxlength="30"
                                    class="form-control form-control-sm" required disabled>

                            </td>
                            <td><input wire:model="listaCalificaciones.{{ $alumno->ID_ALUMNO }}.P3"
                                    name="{{ $alumno->ID_ALUMNO }}-P3" type="number" maxlength="30"
                                    class="form-control form-control-sm" required disabled>

                            </td>
                            <td><input wire:model="listaCalificaciones.{{ $alumno->ID_ALUMNO }}.P4"
                                    name="{{ $alumno->ID_ALUMNO }}-P3" type="number" maxlength="30"
                                    class="form-control form-control-sm" required disabled>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="table.draw(); alert('');">Cerrar</a>
                <button type="submit" class="btn btn-success">Modificar</a>
            </div>
        </form>

    </div>

    <script>
        Livewire.on('grupoChanged', () => {
            table.draw();
        })
    </script>


</div>
