<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Descuento;

class DescuentoForm extends Component
{
    public $name;
    public $discount_percentage;
    public $description;
    public $start_date;
    public $end_date;
    public $ItemId;
    public $catalogo_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'discount_percentage' => 'required|numeric|min:0|max:100',
        'description' => 'nullable|string|max:1000',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ];

    protected $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'discount_percentage.required' => 'El porcentaje de descuento es obligatorio.',
        'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
        'start_date.required' => 'La fecha de inicio es obligatoria.',
        'end_date.required' => 'La fecha de expiración es obligatoria.',
        'end_date.after' => 'La fecha de expiración debe ser después de la fecha de inicio.',
    ];

    public function save()
    {
        $this->validate();

        if ($this->ItemId) {
            $descuento = \App\Models\Descuento::find($this->ItemId);
            if ($descuento) {
                $descuento->update([
                    'name' => $this->name,
                    'amount' => $this->discount_percentage,
                    'description' => $this->description,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]);
                session()->flash('message', 'Descuento actualizado con éxito.');
            }
        } else {
            Descuento::create([
                'name' => $this->name,
                'amount' => $this->discount_percentage,
                'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'catalogo_id' => auth()->user()->catalogo->id,
        ]);

        session()->flash('message', 'Descuento guardado exitosamente.');
    }
    
    $this->redirectRoute('descuentos');


    }

    public function mount($ItemId = null)
    {
        $this->ItemId = $ItemId;

        if ($this->ItemId) {
            $descuento = \App\Models\Descuento::find($this->ItemId);
            if ($descuento) {
                $this->name = $descuento->name;
                $this->discount_percentage = $descuento->amount;
                $this->description = $descuento->description;
                $this->start_date = $descuento->start_date;
                $this->end_date = $descuento->end_date;
            }else {
                $this->name = '';
                $this->discount_percentage = '';
                $this->description = '';
                $this->start_date = '';
                $this->end_date = '';
            }
        }
    }
    
    public function render()
    {
        return view('livewire.descuento-form');
    }
}
