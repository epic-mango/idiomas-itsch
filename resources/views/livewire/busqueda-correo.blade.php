<div class="dropdown">
    <input maxlength="30" type="hidden" id="buscaremail" class="form-control" name="ADMIN_CORREO"
        placeholder="name@example.com" required>


    <input type="text" class="form-control" id="busqueda" wire:model="busqueda" text="{{ $seleccionado }}" required />


    <div class="form-group ajax-search">

        <ul id="resultados" class="dropdown-menu @if (sizeof($resultado) > 0) show @endif ">
            @foreach ($resultado as $res)
                <li class="dropdown-item" onclick="
                $('#busqueda').val(this.innerHTML);
                $('#buscaremail').val({{ $res['id']}});
                $('#resultados').removeClass('show');
                ">{{ $res['email'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
