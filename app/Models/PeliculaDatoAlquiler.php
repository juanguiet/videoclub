<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculaDatoAlquiler extends Model
{
    use HasFactory;

    protected $table = 'peliculas_datos_alquileres';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'alquiler_id',
        'pelicula_dato_id',
        'pelicula_dato_alquiler_fecha_inicio',
        'pelicula_dato_alquiler_fecha_fin',
        'pelicula_dato_alquiler_valor_pagar',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // Muchos a uno
    public function alquileres()
    {
        return $this->belongsTo(Alquiler::class, 'alquiler_id', 'id');
    }

    public function peliculas_datos()
    {
        return $this->belongsTo(PeliculaDato::class, 'pelicula_dato_id', 'id');
    }
}
