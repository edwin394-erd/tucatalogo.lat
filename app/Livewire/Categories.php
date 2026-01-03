<?php

namespace App\Livewire;

use Livewire\Component;

class Categories extends Component
{

    
    public function render()
    {
        $catalogo = auth()->user()->catalogo;

        return view('livewire.categories', compact('catalogo'))
            ->extends('layouts.auth2')
            ->section('content');

    }
}
