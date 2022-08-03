<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FilmsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $formType = Request::input('formType');

        switch($formType)
        {
            case 'film-type-create':
                return [
                    'pelicula_tipo_nombre' => 'required|max:40|unique:peliculas_tipos',
                    'pelicula_tipo_dia_adicional_desde' => 'required|integer|min:0',
                    'pelicula_tipo_porcent_dia_adicional' => 'required|integer|min:0|max:100',
                ];
            break;

            case 'film-type-edit':
                return [
                    'pelicula_tipo_nombre' => 'required|max:40|unique:peliculas_tipos,id,' . Request::input('pelicula_tipo_nombre'),
                    'pelicula_tipo_dia_adicional_desde' => 'required|integer|min:0',
                    'pelicula_tipo_porcent_dia_adicional' => 'required|integer|min:0|max:100',
                ];
            break;


            case 'films-gender-add':
                return [
                    'pelicula_genero_nombre' => 'required|max:60|unique:peliculas_generos'
                ];
            break;


            case 'films-gender-edit':
                return [
                    'pelicula_genero_nombre' => 'required|max:60|unique:peliculas_generos,id,' . Request::input('pelicula_genero_nombre')
                ];
            break;
        }
        
    }
}
