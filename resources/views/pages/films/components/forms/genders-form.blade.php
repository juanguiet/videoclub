<div class="row">
    <div class="col-12">
        <div class="form-group">
            <span>* Tipo de generó</span>
            <input type="text" name="pelicula_genero_nombre" id="pelicula_genero_nombre" class="form-control" placeholder="Ingrese el generó de película" value="{{ old('pelicula_genero_nombre', $film_gender->pelicula_genero_nombre) }}" autocomplete="off">
            <span class="has-error pelicula_genero_nombreError">&nbsp;</span>
        </div>
    </div>
</div>