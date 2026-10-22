<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'usuario';

    public function contactos()
    {
        return $this->hasMany(contacto::class);
    }
}
