<div class="row">
    <div class="col-12">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="pelicula_dato_nombre" id="pelicula_dato_nombre" placeholder="Ingrese el nombre de película" value="{{ old('pelicula_dato_nombre', $film_data->pelicula_dato_nombre) }}" autocomplete="off">
            <label for="pelicula_dato_nombre">* Nombre de película</label>
            <span class="has-error pelicula_dato_nombreError">&nbsp;</span>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-12 col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control selectDate" name="pelicula_dato_fecha_estreno" id="pelicula_dato_fecha_estreno" placeholder="Seleccione la fecha de estreno. YYYY-MM-DD" value="{{ old('pelicula_dato_fecha_estreno', $film_data->pelicula_dato_fecha_estreno) }}" autocomplete="off">
            <label for="pelicula_dato_fecha_estreno">* Fecha de estreno</label>
            <span class="has-error pelicula_dato_fecha_estrenoError">&nbsp;</span>
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="pelicula_dato_precio_unitario" id="pelicula_dato_precio_unitario" placeholder="Ingrese el precio unitario" value="{{ old('pelicula_tipo_porcent_dia_adicional', $film_data->pelicula_dato_precio_unitario) }}" autocomplete="off">
            <label for="pelicula_dato_precio_unitario">* Precio unitario</label>
            <span class="has-error pelicula_dato_precio_unitarioError">&nbsp;</span>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-12 col-md-6">
        <div class="form-floating">
            <select class="form-select" id="pelicula_tipo_id" name="pelicula_tipo_id" aria-label="Floating label select">
                <option value="-1">Seleccione un tipo</option>
                @foreach($film_types as $film_type)
                    <option value="{{ $film_type->id }}">{{ $film_type->pelicula_tipo_nombre }}</option>
                @endforeach
            </select>
            <label for="pelicula_tipo_id">Seleccione un tipo</label>
            <span class="has-error pelicula_tipo_idError">&nbsp;</span>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Ingrese la sinopsis" id="pelicula_dato_sinopsis" name="pelicula_dato_sinopsis" style="height: 100px" autocomplete="off">{{ old('pelicula_dato_sinopsis', $film_data->pelicula_dato_sinopsis) }}</textarea>
            <label for="pelicula_dato_sinopsis">* Tipo de película</label>
            <span class="has-error pelicula_dato_sinopsisError">&nbsp;</span>
        </div>
    </div>
</div>