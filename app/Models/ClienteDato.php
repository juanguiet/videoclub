<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteDato extends Model
{
    use HasFactory;

    protected $table = 'clientes_datos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cliente_dato_num_identificacion',
        'cliente_dato_nombres',
        'cliente_dato_apellidos',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // Uno a muchos
    public function alquileres()
    {
        return $this->hasMany(Alquiler::class, 'cliente_dato_id', 'id');
    }

}
