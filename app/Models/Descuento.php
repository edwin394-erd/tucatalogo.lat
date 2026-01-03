<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'type',
        'start_date',
        'end_date',
        'description',
        'catalogo_id',

    ];
    
    protected static function booted()
    {
        static::deleting(function ($descuento) {
            // Poner descuento_id en null para todos los productos que usan este descuento
            \App\Models\Product::where('descuento_id', $descuento->id)
                ->update(['descuento_id' => null]);
        });
    }

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    
    }
}
