<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plantilla extends Model
{
    protected $table = 'plantillas';

    protected $fillable = [
        'nombre',
    ];

    // public function catalogo()
    // {
    //     return $this->HasMany(Catalogo::class);
    // }
}
