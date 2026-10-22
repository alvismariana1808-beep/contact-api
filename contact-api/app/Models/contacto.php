<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    protected $table = 'contacto';

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }
}
