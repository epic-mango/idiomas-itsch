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

        <table id="example" class="table table-hover table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Unidad 1</th>
                    <th scope="col">Unidad 2</th>
                    <th scope="col">Unidad 3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listaAlumnos as $alumno)
                    <tr>
                        <th scope="row">{{ $alumno->ALUMNO_NOMBRE }} {{ $alumno->ALUMNO_APELLIDO_PAT }}
                            {{ $alumno->ALUMNO_APELLIDO_MAT }}</th>
                        <td>{{ $alumno->ID_ALUMNO }}</td>
                        <td><input value="{{ $alumno->inscripcion->P1 }}" type="text" maxlength="30"
                                class="form-control form-control-sm" required>
                        </td>
                        <td><input value="{{ $alumno->inscripcion->P2 }}" type="text" maxlength="30"
                                class="form-control form-control-sm" required>
                        </td>
                        <td><input value="{{ $alumno->inscripcion->P3 }}" type="text" maxlength="30"
                                class="form-control form-control-sm" required>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="modal-footer">
            <a type="button" class="btn btn-secondary" data-dismiss="modal" onclick="table.draw(); alert('');">Cerrar</a>
            <a href="/home" type="submit" class="btn btn-success">Modificar</a>
        </div>
    </div>
</div>

<script>
    Livewire.on('postAdded', () => {
        table.draw();
    })
</script>
