<?php

namespace App\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $model;

    public function mount()
    {
        $this->model = 'Product';
    }

    public function render()
    {
        return view('livewire.products')
        ->extends('layouts.auth2')
        ->section('content')
        ->with('model', $this->model);

       
    }
}
