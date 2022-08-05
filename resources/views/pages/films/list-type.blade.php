@extends('vendor.template.master')

@section('page-title', 'Tipos de películas')

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
                <button class="btn btn-info float-end btnAction" data-accion="abrir-modal" data-route="{{ route('helpers.get_modal') }}" data-target="#films-type-add-modal">
                    Agregar
                </button>
            </div>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12 mt-5">
                <div id="dataDisplay"></div>
            </div>
        </div>
    </div>

    <div id="modalData"></div>

    <input type="hidden" id="getData" value="{{ route('films.films_type.films_type_get_data') }}" data-target="#dataDisplay" />
    <input type="hidden" id="viewLoading" value="{{ $view_load }}" />

@endsection

@section('page-styles')
    <link href="{{ URL::asset('content/vendor/simple-notify/dist/simple-notify.min.css') }}" rel="stylesheet" />
@endsection

@section('page-scripts')
    <script src="{{ URL::asset('content/vendor/simple-notify/dist/simple-notify.min.js') }}"></script>
@endsection