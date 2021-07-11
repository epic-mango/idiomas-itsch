@extends('layout/main')


@section('contenido-main')




<div class="modal-dialog modal-xl">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Agregar Adeudo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @foreach ($selecadeudo as $informacion )
        <form action="{{ route('update.modoficar-adeudo', $informacion->ID_ADEUDO ) }}" method="POST">
            @method('PATCH')
            @csrf

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID:</label>
                            <input type="text" name="ID_ADEUDO" class="form-control form-control-sm" maxlength="30"
                                placeholder="Adeudo" value="{{ $informacion->ID_ADEUDO }}" required>
                            {!! $errors->first('ID_ADEUDO','<span class="alert-danger">:message</span><br>')
                            !!}

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Alumno:</label>
                            <select name="ADEUDO_ID_ALUMNO" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">

                                <option value={{  $informacion->ID_ALUMNO }}> {{ $informacion->ALUMNO_NOMBRE }}
                                    {{ $informacion-> ALUMNO_APELLIDO_MAT}} {{ $informacion->ALUMNO_APELLIDO_PAT }}
                                </option>
                                <?php foreach ($selecalum as $item)  {?>

                                <option value={{ $item->ID_ALUMNO }}>

                                    <?php  echo $item->	ALUMNO_NOMBRE," ", $item->	ALUMNO_APELLIDO_MAT," ", $item->ALUMNO_APELLIDO_PAT ; 
                                        
                                            
                                        ?>
                                    </>

                                    <?php
                                   
                          
                                            }//cierro el foreach
                                            ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre Adeudor:</label>
                            <input type="text" name="DEU_NOM" pattern="[a-zZ-A]{1,40}" maxlength="40"
                                class="form-control form-control-sm" placeholder="Nombre"
                                value="{{  $informacion->DEU_NOM }}" required>
                            {!! $errors->first('DEU_NOM','<span class="alert-danger">:message</span><br>')
                            !!}


                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Inscripcion:</label>
                            <select name="ADEUDO_ID_INSCRIPCION" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">
                                <option> {{  $informacion->ID_INSCRIPCION }} </option>
                                <?php foreach ($selecinscripcion as $item)  {?>

                                <option>

                                    <?php  echo $item->	ID_INSCRIPCION ; 
                                        
                                            
                                        ?>
                                    </>

                                    <?php
                                   
                          
                                            }//cierro el foreach
                                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Monto:</label>
                            <input name="ADEUDO_MONTO" value="{{  $informacion->ADEUDO_MONTO }}" type="tel"
                                maxlength="11" pattern="[0-9]{1,11}" class="form-control form-control-sm"
                                placeholder="$" required>
                            {!! $errors->first('ADEUDO_MONTO','<span class="alert-danger">:message</span><br>')
                            !!}
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1 ">Fecha de
                                Adeudo:</label>

                            <input name="ADEUDO_FECHA" class="form-control form-control-sm" type="date"
                                value="{{  $informacion->ADEUDO_FECHA }}" id="example-date-input">

                        </div>



                        <div class="form-group">
                            <label for="exampleFormControlInput1">Monto Restante:</label>
                            <input name="ADEUDO_MONTO_RES" value="{{  $informacion->ADEUDO_MONTO_RES }}" type="tel"
                                maxlength="11" pattern="[0-9]{1,11}" class="form-control form-control-sm"
                                placeholder="Monto Restante" required>
                            {!! $errors->first('ADEUDO_MONTO_RES','<span class="alert-danger">:message</span><br>')
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Monto Actual:</label>
                            <input name="ADEUDO_MONTO_ACTUAL" value="{{  $informacion->ADEUDO_MONTO_ACTUAL }}"
                                type="tel" maxlength="11" pattern="[0-9]{1,11}" class="form-control form-control-sm"
                                placeholder="Monto Actual" required>
                            {!! $errors->first('ADEUDO_MONTO_ACTUAL','<span class="alert-danger">:message</span><br>')
                            !!}
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group ">
                            <label for="exampleFormControlInput1 ">Fecha Nueva:</label>

                            <input name="ADEUDO_FECHA_NUE" class="form-control form-control-sm" type="date"
                                value={{ $informacion-> ADEUDO_FECHA_NUE }} id="example-date-input">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Montor Restante:</label>
                            <input name="ADEUDO_MONTO_RESTANTE" value="{{  $informacion->ADEUDO_MONTO_RESTANTE }}"
                                type="tel" maxlength="11" pattern="[0-9]{1,11}" class="form-control form-control-sm"
                                placeholder="$" required>
                            {!! $errors->first('ADEUDO_MONTO_RESTANTE','<span class="alert-danger">:message</span><br>')
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">DEU_CON:</label>
                            <input type="text" name="DEU_CON" pattern="[a-zZ-A]{1,80}" maxlength="80"
                                class="form-control form-control-sm" placeholder="DEU_CON"
                                value="{{  $informacion->DEU_CON }}" required>
                            {!! $errors->first('DEU_CON','<span class="alert-danger">:message</span><br>')
                            !!}


                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">DEU_PER:</label>
                            <input type="text" name="DEU_PER" pattern="[a-zZ-A]{1,30}" maxlength="8"
                                class="form-control form-control-sm" placeholder="DEU_PER"
                                value="{{  $informacion->DEU_PER }}" required>
                            {!! $errors->first('DEU_PER','<span class="alert-danger">:message</span><br>')
                            !!}


                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">DEU_AN:</label>
                            <input type="text" name="DEU_AN" pattern="[a-zZ-A]{1,50}" maxlength="50"
                                class="form-control form-control-sm" placeholder="DEU_AN"
                                value="{{  $informacion->DEU_AN }}" required>
                            {!! $errors->first('DEU_AN','<span class="alert-danger">:message</span><br>')
                            !!}


                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observaciones:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="ADEUDO_OBSERVACIONES"
                                maxlength="500" rows="3" required> {{  $informacion->ADEUDO_OBSERVACIONES }} </textarea>
                        </div>
                    </div>
                    @endforeach
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>

                </div>
        </form>

    </div>
</div>








<!--FINAL  CUADRO SALIDA AGREGAR ADEUDO->


@endsection