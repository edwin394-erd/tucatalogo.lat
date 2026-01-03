<?php

namespace App\Livewire;

use Livewire\Component;

class CreateItem extends Component
{
    public $model;

    public function mount($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        return view('livewire.create-item')
            ->extends('layouts.auth2')
            ->section('content');
    }
}
