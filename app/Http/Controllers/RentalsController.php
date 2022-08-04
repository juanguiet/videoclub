<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalsRequest;
use App\Models\Alquiler;
use App\Models\ClienteDato;
use App\Models\PeliculaDato;
use App\Models\PeliculaDatoAlquiler;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RentalsController extends Controller
{

    public $view_load;

    function __construct()
    {
        if(!Session::has('films'))
        {
            Session::put('films', array());
        }

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

        return View::make('pages.rental.create-rental', 
                                        [
                                            'view_load' => $this->view_load,
                                            'alquiler' => $alquiler,
                                            'cliente_dato' => $cliente_dato,
                                            'peliculas_datos_alquileres' => $peliculas_datos_alquileres,
                                            'clientes_datos' => $clientes_datos,
                                             'films_data' => $films_data]);
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

    /* Films cart session */
    public function film_view_added($ajax = 'no')
    {
        $films = Session::get('films');

        if(count(Session::get('films')) == 0 || Session::get('films') == null)
        {
            if($ajax === 'ajax')
            {
                return response()->json(
                    [
                        'status' => 'ok',
                        'message' => 'No hay películas agregadas',
                        'total' => count(Session::get('films')),
                        'view' => View::make('pages.rental.messages.empty-films-selected')->render()
                    ], 200
                );
            }

            return View::make('pages.rental.messages.empty-films-selected');
        }

        $total_pay = 0;

        foreach($films as $film)
        {
            $total_pay += ($films[$film->id]->valorunitario * $films[$film->id]->amount);
        }

        if($ajax === 'ajax')
        {
            return response()->json(
                [
                    'status' => 'ok',
                    'total' => count(Session::get('films')),
                    'view' => View::make('pages.rental.components.lists.rental-data-films', compact('films', 'total_pay'))->render()
                ], 200
            );
        }

        return View::make('pages.rental.components.lists.rental-data-films', compact('films', 'total_pay'));
    }

    public function film_add(RentalsRequest $request)
    {
        $films = Session::get('films');
        $film = $request->input('pelicula_dato');
        $fil_array = explode(' - ', $film);
        $film_id = $fil_array[0];
        $film_name = $fil_array[1];
        $msg = 'No se ha podido agregar la película';

        $film_data = PeliculaDato::GetInfo($film_id)->first();

        if($film_data)
        {
            if(find_by_data($films, 'id', $film_id))
            {
                $msg = 'Película ' . $film_name . ' esta en la lista';

                return response()->json(
                    [
                        'status' => 'find',
                        'message' => $msg,
                        'erros' => [
                            'pelicula_dato' => $msg
                        ]
                    ], 422
                );
            }

            $film_data->pelicula_dato_alquiler_fecha_inicio = fecha_actual()->format('Y-m-d');
            $film_data->pelicula_dato_alquiler_fecha_fin = fecha_actual()->addDays(1)->format('Y-m-d');
            $film_data->pelicula_dato_alquiler_num_dias = countDaysDiferent($film_data->pelicula_dato_alquiler_fecha_inicio, $film_data->pelicula_dato_alquiler_fecha_fin);
            $film_data->pelicula_dato_alquiler_valor_sub_total = 0;
            $film_data->pelicula_dato_alquiler_valor_pagar = 0;
    
            $films[$film_data->id] = $film_data;
            Session::put('films', $films);
            $msg = 'Película ' . $film_name . ' agregada';
        }

        return response()->json(
            [
                'status' => 'ok',
                'message' => $msg,
                'view' => $this->film_view_added()->render()
            ], 200
        );
    }

    public function film_change_dates(RentalsRequest $request)
    {
        $films = Session::get('films');
        $film_id = $request->input('pelicula_dato');
        $txt_pelicula_dato_alquiler_fecha_inicio = $request->input('pelicula_dato_alquiler_fecha_inicio');
        $txt_pelicula_dato_alquiler_fecha_fin = $request->input('pelicula_dato_alquiler_fecha_fin');

        $film_data = $films[$film_id];
        $film_data->pelicula_dato_alquiler_fecha_inicio = $txt_pelicula_dato_alquiler_fecha_inicio;
        $film_data->pelicula_dato_alquiler_fecha_fin = $txt_pelicula_dato_alquiler_fecha_fin;
        $film_data->pelicula_dato_alquiler_num_dias = countDaysDiferent($film_data->pelicula_dato_alquiler_fecha_inicio, $film_data->pelicula_dato_alquiler_fecha_fin);
        $film_data->pelicula_dato_alquiler_valor_sub_total = 0;
        $film_data->pelicula_dato_alquiler_valor_pagar = 0;

        $films[$film_id] = $film_data;
        Session::put('films', $films);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Fechas actualizadas',
                'view' => $this->film_view_added()->render(),
            ]
        );
    }

    public function film_remove(Request $request)
    {
        $films = Session::get('films');
        unset($films[$request->input('pelicula_dato')]);
        Session::put('films', $films);

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Película eliminada',
                'view' => $this->film_view_added()->render(),
            ], 200
        );
    }

    public function film_price_total(RentalsRequest $request)
    {
        if($request->ajax())
        {
            $total_pagar = 0;
            $total = Session::get('films');
            $cesta = Session::get('films');
            $cantidad = $request->input('dato');
            $producto = $request->input('producto');
            $valor_unitario = $cesta[$request->input('producto')]->valorunitario;
            $cesta[$request->input('producto')]->cantidad = $cantidad;
            Session::put('films', $cesta);

            foreach($cesta as $cestas)
            {
                $total_pagar += ($total[$cestas->id]->valorunitario * $total[$cestas->id]->cantidad);
            }

            return response()->json(
                [
                    'mensaje' => 'Cantidad del producto actualizada',
                    'total' => count(Session::get('films')),
                    'total_costo_prodc' => ($valor_unitario * $cantidad),
                    'producto' => $producto,
                    'totalpagar' => $total_pagar
                ]
            );
        }
    }

}
