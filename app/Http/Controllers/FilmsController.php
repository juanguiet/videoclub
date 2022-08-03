<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmsRequest;
use App\Models\PeliculaGenero;
use Illuminate\Support\Facades\View;

use App\Models\PeliculaTipo;

class FilmsController extends Controller
{

    public $view_load;

    function __construct()
    {
        $this->view_load = View::make('vendor.messages.loading-data');
    }

    public function index()
    {
        return View::make('pages.films.list-films');
    }

    /** 
     * Functions for types
     * CRUD
     **/
    public function films_type_list()
    {
        return View::make('pages.films.list-type', ['view_load' => $this->view_load]);
    }

    public function films_type_create(FilmsRequest $request)
    {
        $txt_pelicula_tipo_nombre = $request->input('pelicula_tipo_nombre');
        $txt_pelicula_tipo_dia_adicional_desde = $request->input('pelicula_tipo_dia_adicional_desde');
        $txt_pelicula_tipo_porcent_dia_adicional = $request->input('pelicula_tipo_porcent_dia_adicional');

        $film_type = new PeliculaTipo();
        $film_type->pelicula_tipo_nombre = $txt_pelicula_tipo_nombre;
        $film_type->pelicula_tipo_dia_adicional_desde = $txt_pelicula_tipo_dia_adicional_desde;
        $film_type->pelicula_tipo_porcent_dia_adicional = $txt_pelicula_tipo_porcent_dia_adicional;
        $film_type->updated_at = null;
        $film_type->save();

        return response()
                ->json(
                    [
                        'status' => 'ok',
                        'action' => 'created',
                        'data' => $film_type
                    ], 200
                );
    }

    public function films_type_edit(FilmsRequest $request, $id)
    {
        $txt_pelicula_tipo_nombre = $request->input('pelicula_tipo_nombre');
        $txt_pelicula_tipo_dia_adicional_desde = $request->input('pelicula_tipo_dia_adicional_desde');
        $txt_pelicula_tipo_porcent_dia_adicional = $request->input('pelicula_tipo_porcent_dia_adicional');

        $film_type = PeliculaTipo::find($id);
        $film_type->pelicula_tipo_nombre = $txt_pelicula_tipo_nombre;
        $film_type->pelicula_tipo_dia_adicional_desde = $txt_pelicula_tipo_dia_adicional_desde;
        $film_type->pelicula_tipo_porcent_dia_adicional = $txt_pelicula_tipo_porcent_dia_adicional;
        $film_type->save();

        return response()
                ->json(
                    [
                        'status' => 'ok',
                        'action' => 'updated',
                        'data' => $film_type
                    ], 200
                );
    }

    public function films_type_get_data()
    {
        $types = PeliculaTipo::GetInfo()->get();
        $view = count($types) > 0 ? 'pages.films.components.lists.types-list' : 'vendor.messages.empty-data';

        return response()
                ->json([
                        'status' => 'ok',
                        'view' => View::make($view, compact('types'))->render()
                    ], 200);
    }

    /** 
     * Functions for genders
     * CRUD
     **/
    public function films_genders_list()
    {
        return View::make('pages.films.list-gender', ['view_load' => $this->view_load]);
    }

    public function films_genders_create(FilmsRequest $request)
    {
        $txt_pelicula_genero_nombre = $request->input('pelicula_genero_nombre');

        $film_gender = new PeliculaGenero();
        $film_gender->pelicula_genero_nombre = $txt_pelicula_genero_nombre;
        $film_gender->updated_at = null;
        $film_gender->save();

        return response()
                ->json(
                    [
                        'status' => 'ok',
                        'action' => 'created',
                        'data' => $film_gender
                    ], 200
                );
    }

    public function films_genders_edit(FilmsRequest $request, $id)
    {
        $txt_pelicula_genero_nombre = $request->input('pelicula_genero_nombre');

        $film_gender = PeliculaGenero::find($id);
        $film_gender->pelicula_genero_nombre = $txt_pelicula_genero_nombre;
        $film_gender->save();

        return response()
                ->json(
                    [
                        'status' => 'ok',
                        'action' => 'updated',
                        'data' => $film_gender
                    ], 200
                );
    }

    public function films_genders_get_data()
    {
        $genders = PeliculaGenero::GetInfo()->get();
        $view = count($genders) > 0 ? 'pages.films.components.lists.genders-list' : 'vendor.messages.empty-data';

        return response()
                ->json([
                        'status' => 'ok',
                        'view' => View::make($view, compact('genders'))->render()
                    ], 200);
    }

}
