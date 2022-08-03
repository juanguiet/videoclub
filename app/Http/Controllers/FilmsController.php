<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmsRequest;
use Illuminate\Support\Facades\View;

class FilmsController extends Controller
{

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
        return View::make('pages.films.list-type');
    }

    public function films_type_create(FilmsRequest $request)
    {

    }

    public function films_type_edit(FilmsRequest $request)
    {

    }

    public function films_type_delete()
    {

    }

    /** 
     * Functions for genders
     * CRUD
     **/
    public function films_genders_list()
    {
        return View::make('pages.films.list-gender');
    }

    public function films_genders_create(FilmsRequest $request)
    {

    }

    public function films_genders_edit(FilmsRequest $request)
    {

    }

    public function films_genders_delete()
    {

    }

}
