<div class="row">
    <div class="col-12">
        <div class="form-group">
            <span>* Tipo de película</span>
            <input type="text" name="pelicula_tipo_nombre" id="pelicula_tipo_nombre" class="form-control" placeholder="Ingrese el tipo de película" value="{{ old('pelicula_tipo_nombre', $film_type->pelicula_tipo_nombre) }}" autocomplete="off">
            <span class="has-error pelicula_tipo_nombreError">&nbsp;</span>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <span>* Cobrar adición despes de número de días</span>
            <input type="number" name="pelicula_tipo_dia_adicional_desde" id="pelicula_tipo_dia_adicional_desde" class="form-control" placeholder="Ingrese el número de días para cobrar adición" value="{{ old('pelicula_tipo_dia_adicional_desde', $film_type->pelicula_tipo_dia_adicional_desde) }}" autocomplete="off">
            <span class="has-error pelicula_tipo_dia_adicional_desdeError">&nbsp;</span>
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <span>* Porcentaje por día de adición</span>
            <input type="number" name="pelicula_tipo_porcent_dia_adicional" id="pelicula_tipo_porcent_dia_adicional" class="form-control" placeholder="Ingrese el porcentaje por día de adición" value="{{ old('pelicula_tipo_porcent_dia_adicional', $film_type->pelicula_tipo_porcent_dia_adicional) }}" autocomplete="off">
            <span class="has-error pelicula_tipo_porcent_dia_adicionalError">&nbsp;</span>
        </div>
    </div>
</div>