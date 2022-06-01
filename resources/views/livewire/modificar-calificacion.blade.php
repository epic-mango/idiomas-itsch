<div>
    <div class="container">
        <div class="col-sm">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Grupos:</label>
                <select class="form-control  form-control-sm" name="DOCENTE_SEXO" id="exampleFormControlSelect1" wire:model="$emit('grupoCambiado')">

                    @foreach($listaGrupos as $grupo)
                    <option value="{{$grupo}}">{{$grupo}}</option>
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
            <tbody wire:model="listaAlumnos">
                @foreach ($listaAlumnos as $alumno)
                <tr>
                    <th scope="row">$alumno</th>
                    <td>S16030159</td>
                    <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                    </td>
                    <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                    </td>
                    <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="modal-footer">
            <a href="/home" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
            <a href="/home" type="submit" class="btn btn-success">Modificar</a>
        </div>
    </div>
</div>