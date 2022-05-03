<div class="dropdown">
    <input maxlength="30" type="hidden" id="buscaremail" name="ADMIN_CORREO" value="{{$identificador}}" required>
    {!! $errors->first('ADMIN_CORREO', '<spanclass="alert-danger">:message</span><br>') !!}
    <input type="text" class="form-control {{ $seleccionado ? 'is-valid' : 'is-invalid' }}" id="busqueda"
        wire:model="busqueda" wire:keydown="buscar" autocomplete="off" required />
    <div class="form-group ajax-search">
        <ul id="resultados" class="dropdown-menu @if (sizeof($resultado) > 0 && !$seleccionado) show @endif ">
            @foreach ($resultado as $res)
                <li class="dropdown-item" onclick="$('#resultados').removeClass('show');"
                    wire:click="seleccionar({{ $res['id'] }}, '{{ $res['email'] }}')">{{ $res['email'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
