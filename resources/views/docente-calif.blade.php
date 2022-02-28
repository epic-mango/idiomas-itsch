@extends('layout/main')


@section('contenido-main')

<div class="container">
    <div class="col-sm">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Grupos:</label>
            <select class="form-control  form-control-sm" name="DOCENTE_SEXO" id="exampleFormControlSelect1">

                <option>M1</option>
                <option>M3</option>
                <option>M6</option>
                <option>M10</option>

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
            <tr>
                <th scope="row">Raul Armando</th>
                <td>S16030159</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Karla Elizabeth</th>
                <td>S16030160</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Daniela Castaneda</th>
                <td>S16030374</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Adilene</th>
                <td>S16030169</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Orlando</th>
                <td>S16030160</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Erik Sosa</th>
                <td>S16030170</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Armando Roperos</th>
                <td>S16030180</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Santa Fe Klan</th>
                <td>S16030140</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Lupillo Rivera</th>
                <td>S16030500</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>
            <tr>
                <th scope="row">MC Dabo</th>
                <td>S16030666</td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
                <td><input value="8" type="text" maxlength="30" class="form-control form-control-sm" required>
                </td>
            </tr>

        </tbody>
    </table>

    <div class="modal-footer">
        <a href="/home" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
        <a href="/home" type="submit" class="btn btn-success">Modificar</a>
    </div>
</div>

@endsection