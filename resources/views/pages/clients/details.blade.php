@extends('vendor.template.master')

@section('page-title', 'Clientes')

@section('page-content-breadcrumb')
    <div class="mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Inicio</a>
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
                <button class="btn btn-info float-end btnAction" data-accion="abrir-modal" data-route="{{ route('helpers.get_modal') }}" data-target="#clients-upload-modal">
                    Cargar clientes
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

    <input type="hidden" id="getData" value="{{ route('clients.get_clients') }}" data-target="#dataDisplay" />
    <input type="hidden" id="viewLoading" value="{{ $view_load }}" />

@endsection