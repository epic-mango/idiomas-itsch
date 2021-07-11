@extends('layout/main')


@section('contenido-main')

<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Modificar Asistencia</h5>

        </div>

        @foreach ($selecasistencia as $informacion )
        <form action="{{ route('update.modoficar-asistencia', $informacion->ID_ASISTENCIA ) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="container">

                <div class="row">
                    <div class="col-sm">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Clave:</label>
                            <input type="text" name="ID_ASISTENCIA" class="form-control form-control-sm"
                                pattern="[A-Zz-a]{1,30}" maxlength="30" placeholder="Clave"
                                value="{{ $informacion->ID_ASISTENCIA }}" required disabled>
                            {!! $errors->first('ID_ASISTENCIA','<span class="alert-danger">:message</span><br>')
                            !!}

                        </div>



                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nombre Grupo:</label>
                            <select name="ASISTENCIA_ID_GRUPO_NOMBRE" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">


                                <option>{{ $informacion->ID_GRUPO_NOMBRE }}</option>
                                <?php foreach ($selecgrupo as $item)  {?>

                                <option>

                                    <?php  echo $item->	ID_GRUPO_NOMBRE; 
                                
                                    
                                ?>
                                    </>

                                    <?php
                           

                                    }//cierro el foreach
                                    ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Docentes:</label>
                            <select name="ASISTENCIA_ID_DOCENTE" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">


                                <option value={{ $informacion->ID_DOCENTE }}>{{ $informacion->DOCENTE_NOMBRE }}
                                    {{ $informacion->DOCENTE_AP_PAT }} {{ $informacion->DOCENTE_AP_MAT }}</option>
                                <?php foreach ($selecdocente as $item)  {?>

                                <option value={{ $item->ID_DOCENTE}}>

                                    <?php  echo $item->	DOCENTE_NOMBRE," ", $item->	DOCENTE_AP_PAT," ", $item->	DOCENTE_AP_MAT ; 
                                
                                    
                                ?>
                                    </>

                                    <?php
                           

                                    }//cierro el foreach
                                    ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Alumno:</label>
                            <select name="ASISTENCIA_ID_ALUMNO" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">

                                <option value={{ $informacion->ID_ALUMNO }}>{{ $informacion->ALUMNO_NOMBRE }}
                                    {{ $informacion->	ALUMNO_APELLIDO_MAT }} {{$informacion->ALUMNO_APELLIDO_PAT  }}
                                </option>

                                <?php foreach ($selecalum as $item)  {?>

                                <option value={{ $item->ID_ALUMNO}}>

                                    <?php  echo $item->	ALUMNO_NOMBRE," ", $item->	ALUMNO_APELLIDO_MAT," ", $item->ALUMNO_APELLIDO_PAT ; 
                                
                                    
                                ?>
                                    </>

                                    <?php
                           

                                    }//cierro el foreach
                                    ?>

                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="exampleFormControlInput1 ">Fecha de
                                Nacimiento:</label>

                            <input name="ASISTENCIA_FECHA" class="form-control form-control-sm" type="date"
                                value="{{ $informacion->ASISTENCIA_FECHA }}" id="example-date-input">

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Asistencia Clase:</label>
                            <input type="text" name="ASISTENCIA_CLASE" pattern="[a-zZ-A]{1,30}" maxlength="30"
                                class="form-control form-control-sm" placeholder="Asistencia Clase"
                                value="{{ $informacion->ASISTENCIA_CLASE }}" required>
                            {!! $errors->first('ASISTENCIA_CLASE','<span class="alert-danger">:message</span><br>')
                            !!}


                        </div>



                    </div>
                    @endforeach
                </div>

            </div>

            <div class="modal-footer">
                <a href="/asistencia" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                <button type="submit" class="btn btn-success">Modificar</button>

            </div>
        </form>

    </div>
</div>



<!--FINAL  CUADRO SALIDA Modificar Asistencia-->


@endsection