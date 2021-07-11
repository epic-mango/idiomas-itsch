@extends('layout/main')


@section('contenido-main')
<!--INICIO CUADRO SALIDA AGREGAR MODULO-->


<div class="modal-dialog modal-xl">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Agregar Modulo</h5>



        </div>


        @foreach ($selecmodulo as $informacion )
        <form action="{{ route('update.modoficar-modulo', $informacion->ID_MODULO ) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="container">


                <div class="row">
                    <div class="col-sm">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Clave:</label>
                            <input type="text" name="ID_MODULO" class="form-control form-control-sm"
                                pattern="[A-Zz-a]{1,30}" maxlength="30" placeholder="Clave"
                                value="{{ $informacion->ID_MODULO }}" required disabled>
                            {!! $errors->first('ID_MODULO','<span class="alert-danger">:message</span><br>')
                            !!}

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tiempo</label>
                            <input name="MODULO_TIEMPO" value="{{ $informacion->MODULO_TIEMPO }}" type="tel"
                                maxlength="11" pattern="[0-9]{1,11}" class="form-control form-control-sm"
                                placeholder="Cantidad" required>
                            {!! $errors->first('MODULO_TIEMPO','<span class="alert-danger">:message</span><br>')
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre:</label>
                            <input type="text" name="RET_NOM" class="form-control form-control-sm" maxlength="5"
                                placeholder="Clave" value="{{ $informacion->RET_NOM }}" required>
                            {!! $errors->first('RET_NOM','<span class="alert-danger">:message</span><br>')
                            !!}

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">ORD:</label>
                            <input name="RET_ORD" value="{{ $informacion->RET_ORD }}" type="tel" maxlength="4"
                                pattern="[0-9]{1,4}" class="form-control form-control-sm" placeholder="ORD" required>
                            {!! $errors->first('RET_ORD','<span class="alert-danger">:message</span><br>') !!}
                        </div>


                    </div>

                </div>
                @endforeach

            </div>

            <div class="modal-footer">
                <a type="button" href="/modulo" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                <button type="submit" class="btn btn-success">Modificar</button>
            </div>

        </form>
    </div>
</div>



<!--FINAL  CUADRO SALIDA AGREGAR IDIOMA-->
@endsection