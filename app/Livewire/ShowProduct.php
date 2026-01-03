<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Asegúrate de importar tu modelo

class ShowProduct extends Component
{
    public $product;
    public $name;

    public function mount($name,$id)
    {
        // Buscamos el producto por ID. Si no existe, lanza un error 404.
         $id_catalogo = \App\Models\Catalogo::where('name', $name)->firstOrFail()->id;

        // debug rápido: ver valores

        $this->product = Product::where('catalogo_id', $id_catalogo)
        ->where('id', $id)->first();
       

        if (! $this->product) {
            abort(404, "Producto no encontrado: id={$id} catalogo_id={$id_catalogo}");
        }

        $this->name = $name;
    }

    public function addToCart($productId)
    {
        // Aquí debes implementar la lógica del carrito
        // Ejemplo: Cart::add($this->product);
    }

    public function render()
    {
        return view('livewire.show-product')
            ->extends('layouts.guest')
            ->section('content')
            ->with('name',$this->name);

    }
}