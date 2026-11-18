<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "Contacto";
    protected $fillable = [
        'usuario_id',
        'nombre',
        'correo',
        'avatar',
        'telefono'
    ];

    function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
