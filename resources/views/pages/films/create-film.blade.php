@extends('vendor.template.master')

@section('page-title', 'Agregar')

@section('page-content-breadcrumb')
    <div class="mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('films.index') }}">Películas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">@yield('page-title')</li>
            </ol>
        </nav>
    </div>
@endsection

@section('page-content-body')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('films.index') }}" class="btn btn-link">
                    <i class="fa fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
            </div>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12 mt-5">
                <legend>Datos de la película</legend>
            </div>
        </div>
        
        <form action="{{ route('films.films_create_process') }}" method="POST" id="frmData" class="mt-4">
            <input type="hidden" name="formType" id="formType" value="film-create">
            @include('pages.films.components.forms.films-form')
        </form>

        <div class="row mt-4">
            <div class="col-12">
                <button class="btn btn-info btnAction" data-accion="pelicula-dato" data-formulario="#frmData">
                    Agregar
                </button>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ URL::asset('content/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
@endsection

@section('page-scripts')
    <script src="{{ URL::asset('content/common/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('content/vendor/daterangepicker/daterangepicker.js') }}"></script>
@endsection