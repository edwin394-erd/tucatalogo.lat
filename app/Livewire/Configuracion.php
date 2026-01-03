<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Configuracion extends Component
{
        use WithFileUploads;

    public $catalogo;
    public $name;
    public $description;
    public $banner;
    public $logo;
    public $plantilla_id;
    public $telefono_contacto;

    public function mount()
    {
        $this->catalogo = auth()->user()->catalogo;
        $this->name = $this->catalogo->name;
        $this->description = $this->catalogo->description;
        $this->banner = $this->catalogo->banner;
        $this->logo = $this->catalogo->logo;
        $this->plantilla_id = $this->catalogo->plantilla_id;
        $this->telefono_contacto = $this->catalogo->telefono_contacto;
    }


    public function render()
    {
        $catalogo = auth()->user()->catalogo;
        $plantillas = \App\Models\Plantilla::all();
        return view('livewire.configuracion', compact('catalogo', 'plantillas'))
        ->extends('layouts.auth2')
        ->section('content');
    }

    public function saveChanges()
{
    // Validar propiedades locales
    $this->validate([
        'name' => 'required|string|max:255|unique:catalogos,name,' . $this->catalogo->id,
        'description' => 'nullable|string|max:1000',
        'plantilla_id' => 'required|exists:plantillas,id',
        'telefono_contacto' => 'nullable|string|max:20',
    ]);

    // Asignar valores al modelo antes de guardar
    $this->catalogo->update([
        'name' => $this->name,
        'description' => $this->description,
        'plantilla_id' => $this->plantilla_id,
        'telefono_contacto' => $this->telefono_contacto,
    ]);

    session()->flash('message', 'Configuración actualizada con éxito.');
    return redirect()->route('configuracion');
}

public function selectTemplate($templateId)
{
    // Esto es lo que le falta a tu código:
    $this->plantilla_id = $templateId; 
    
    // (Opcional) Esto también ayuda a que la UI se mantenga sincronizada
    $this->catalogo->plantilla_id = $templateId; 
}
    public function updatedBanner()
    {
        $this->validate([
            'banner' => 'image|max:2048', // 2MB Max
        ]);

        $bannerPath = $this->banner->store('banners', 'public');
        $this->catalogo->banner_url = $bannerPath;
        $this->catalogo->save();

        session()->flash('message', 'Banner actualizado con éxito.');
        $this->redirectRoute('configuracion');
    }

    Public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:2048', // 2MB Max
        ]);

        $logoPath = $this->logo->store('logos', 'public');
        $this->catalogo->logo_url = $logoPath;
        $this->catalogo->save();

        session()->flash('message', 'Logo actualizado con éxito.');
        $this->redirectRoute('configuracion');
    }
}
