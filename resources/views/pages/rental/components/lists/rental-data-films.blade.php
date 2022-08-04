<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Película</td>
                <td>Fecha de préstamos y entrega</td>
                <td>Número de días</td>
                <td>Costo renta</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
                <tr>
                    <td>
                        <strong>{{ $film->pelicula_dato_nombre }}</strong><br>
                        <small>Tipo: {{ $film->pelicula_tipo->pelicula_tipo_nombre }}</small>
                    </td>
                    <td>
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control selectDate" name="pelicula_dato_alquiler_fecha_inicio" id="pelicula_dato_alquiler_fecha_inicio" placeholder="Seleccione la fecha de préstamo. YYYY-MM-DD" value="{{ old('pelicula_dato_alquiler_fecha_inicio', $film->pelicula_dato_alquiler_fecha_inicio) }}" autocomplete="off">
                                <label for="pelicula_dato_alquiler_fecha_inicio">* Fecha de préstamos</label>
                                <span class="has-error pelicula_dato_alquiler_fecha_inicioError">&nbsp;</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control selectDate" name="pelicula_dato_alquiler_fecha_fin" id="pelicula_dato_alquiler_fecha_fin" placeholder="Seleccione la fecha de entrega. YYYY-MM-DD" value="{{ old('pelicula_dato_alquiler_fecha_fin', $film->pelicula_dato_alquiler_fecha_fin) }}" autocomplete="off">
                                <label for="pelicula_dato_alquiler_fecha_fin">* Fecha de entrega</label>
                                <span class="has-error pelicula_dato_alquiler_fecha_finError">&nbsp;</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span></span>
                    </td>
                    <td>
                        ${{ number_format(0) }}
                    </td>
                    <td>
                        <button class="btn btn-danger btnAction" data-accion="rental-action-table-film" data-route="{{ route('rental.film_remove') }} " data-pelicula-dato="{{ $film->id }}" data-target="#tableDataFilms">
                            <i class="fa fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>