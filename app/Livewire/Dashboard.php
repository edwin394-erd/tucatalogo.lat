<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Catalogo;

class Dashboard extends Component
{
    public $n_productos;
    public $n_categorias;



    public function render()
    {
        $this->n_productos = Catalogo::find(auth()->user()->catalogo->id)->products()->count();
        $this->n_categorias = Catalogo::find(auth()->user()->catalogo->id)->categories()->count();

        return view('livewire.dashboard')
        ->extends('layouts.auth2')
        ->section('content');
    }
}
