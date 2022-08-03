<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculaDato extends Model
{
    use HasFactory;

    protected $table = 'peliculas_datos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pelicula_dato_nombre',
        'pelicula_dato_sinopsis',
        'pelicula_dato_unitario',
        'pelicula_dato_fecha_estreno',
        'pelicula_tipo_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // Uno a muchos
    public function peliculas_datos_alquileres()
    {
        return $this->hasMany(PeliculaDatoAlquiler::class, 'pelicula_dato_id', 'id');
    }

    public function peliculas_generos_datos()
    {
        return $this->hasMany(PeliculaGeneroDato::class, 'pelicula_dato_id', 'id');
    }

    // Muchos a uno
    public function pelicula_tipo()
    {
        return $this->belongsTo(PeliculaTipo::class, 'pelicula_tipo_id', 'id');
    }
}
