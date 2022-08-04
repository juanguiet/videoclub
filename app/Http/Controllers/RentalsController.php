<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\ClienteDato;
use App\Models\PeliculaDato;
use App\Models\PeliculaDatoAlquiler;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class RentalsController extends Controller
{

    public $view_load;

    function __construct()
    {
        $this->view_load = View::make('vendor.messages.loading-data');
    }

    public function index()
    {
        return View::make('pages.rental.details', ['view_load' => $this->view_load]);
    }

    public function rentals_create()
    {
        $alquiler = new Alquiler();
        $cliente_dato = new ClienteDato();
        $peliculas_datos_alquileres = new PeliculaDatoAlquiler();
        
        $clientes_datos = ClienteDato::GetInfo()->get();
        $films_data = PeliculaDato::Getinfo()->get();

        return View::make('pages.rental.create-rental', compact('alquiler', 'cliente_dato', 'peliculas_datos_alquileres', 'clientes_datos', 'films_data'));
    }

    public function rentals_create_process()
    {

    }

    public function rentals_edit($id)
    {

    }

    public function rentals_edit_process()
    {

    }

    public function rentals_delete($id)
    {

    }

    public function get_rentals()
    {
        $rentals = Alquiler::GetInfo()->paginate(50);
        $rentals->withPath(route('rental.get_rentals'));
        $view = count($rentals) > 0 ? 'pages.rental.components.lists.rentals-list' : 'vendor.messages.empty-data';

        return response()
                ->json([
                        'status' => 'ok',
                        'view' => View::make($view, compact('rentals'))->render()
                    ], 200);
    }

    public function get_search_client(Request $request)
    {
        $txt_cliente_dato_num_identificacion = $request->input('cliente_dato_num_identificacion');

        $clientes_datos = ClienteDato::GetInfo(null, $txt_cliente_dato_num_identificacion)->first();
        $view = count($clientes_datos) > 0 ? 'pages.rental.components.forms.rental-client-data' : 'vendor.messages.empty-data';

        return response()
                ->json([
                        'status' => 'ok',
                        'view' => View::make($view, compact('rentals'))->render()
                    ], 200);
    }

}
