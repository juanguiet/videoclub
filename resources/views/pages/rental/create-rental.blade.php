@extends('vendor.template.master')

@section('page-title', 'Nuevo alquiler')

@section('page-content-breadcrumb')
    <div class="mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('rental.rental_list') }}">Alquiler</a>
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
                <a href="{{ route('rental.rental_list') }}" class="btn btn-link">
                    <i class="fa fa-solid fa-arrow-left"></i>
                    Regresar
                </a>
            </div>

            <div class="col-12">
                <hr />
            </div>
        </div>
        
        <form action="{{ route('films.films_create_process') }}" method="POST" id="frmData" class="mt-2">
            <input type="hidden" name="formType" id="formType" value="film-create">
            @include('pages.rental.components.forms.rental-form')
        </form>

        <div class="row mt-4">
            <div class="col-12">
                <button class="btn btn-info btnAction" data-accion="pelicula-dato" data-formulario="#frmData">
                    Alquilar
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