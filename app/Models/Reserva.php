<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'paquete_id',
        'nombre',
        'telefono',
        'correo',
        'fecha',
        'direccion',
        'indicaciones',
     
        'ci',
        'estado',
    ];
    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
    protected $casts = [
        'fecha' => 'array',
    ];
    
    public function getFechasAttribute($value)
    {
        return json_decode($value);
    }

    public function setFechasAttribute($value)
    {
        $this->attributes['fecha'] = json_encode($value);
    }
   
    use HasFactory;
}
