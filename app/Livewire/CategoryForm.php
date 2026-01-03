<?php

namespace App\Livewire;

use Livewire\Component;

class CategoryForm extends Component
{
    public $ItemId;
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    protected $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser una cadena de texto.',
        'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        'description.string' => 'La descripción debe ser una cadena de texto.',
    ];

    public function mount($ItemId = null)
    {
        $this->ItemId = $ItemId;

        if ($this->ItemId) {
            $category = \App\Models\Category::find($this->ItemId);
            if ($category) {
                $this->name = $category->name;
                $this->description = $category->description;
            }
        }else {
            $this->name = '';
            $this->description = '';
        }
    }

    public function render()
    {
        return view('livewire.category-form');
    }

    public function save()
    {

        $this->validate();

        if ($this->ItemId) {
            $category = \App\Models\Category::find($this->ItemId);
            if ($category) {
                $category->update([
                    'name' => $this->name,
                    'description' => $this->description,
                ]);
            }
            session()->flash('message', 'Categoría actualizada con éxito.');
        } else {
            \App\Models\Category::create([
                'name' => $this->name,
                'description' => $this->description,
                'catalogo_id' => auth()->user()->catalogo->id,
        ]);

        session()->flash('message', 'Categoría creada con éxito.');
        
        $this->redirectRoute('categories');
    }
    

}
}
