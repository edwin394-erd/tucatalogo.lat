<?php

namespace App\Livewire;

use Livewire\Component;

class Descuentos extends Component
{
    
    public function render()
    {
        return view('livewire.descuentos')
        ->extends('layouts.auth2')
        ->section('content');
    }
}
