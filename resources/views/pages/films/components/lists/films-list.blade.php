<div>
    <div class="row">
        <div class="col-12">
            @include('pages.films.components.forms.films-search-form')
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            Total de películas: {{ $films->total() }}
        </div>
    </div>

    <div id="dataDisplayPagination">
        <div class="row mt-4">
            @foreach($films as $film)
                <div class="col-sm-2 col-md-4">
                    <div class="card mb-3">
                        <img src="{{ URL::asset('app/images/general/pcture.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-ellipsis">{{ $film->pelicula_dato_nombre }}</h5>
                            <p class="card-text"><small class="text-muted">Fecha de lanzamiento: {{ $film->pelicula_dato_fecha_estreno->format('d') . ' de ' . mounth($film->pelicula_dato_fecha_estreno->format('m')) . ', ' . $film->pelicula_dato_fecha_estreno->format('Y') }}</small></p>
                            <div class="float-end">
                                <a href="{{ route('films.films_edit', [$film->id]) }}" class="btn btn-default">
                                    <i class="fa fa-solid fa-pencil"></i>
                                </a>

                                <button class="btn btn-danger btnAction" data-accion="abrir-modal" data-route="{{ route('helpers.get_modal') }}" data-target="#films-delete-modal" data-item-info="{{ Crypt::encrypt($film->id) }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {!! $films->links('vendor.pagination.bootstrap-5') !!}
        </div>
    </div>
</div>