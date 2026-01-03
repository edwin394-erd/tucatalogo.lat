<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination; // <-- Agrega esto
use Illuminate\Pagination\LengthAwarePaginator;

class Catalogo extends Component
{
    use WithPagination; // <-- Agrega esto

    public $name;
    public $search = '';
    public $categoryId = null;
    public $scrollToTop = false; // <-- Agrega esto

    protected $queryString = ['search', 'page', 'categoryId'];

    public function mount($name)
    {
        $this->name = $name;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $catalogo = \App\Models\Catalogo::where('name', $this->name)->firstOrFail();
        $catalogo->load('categories', 'products.fotos', 'plantilla');

        $products = $catalogo->products;

        if ($this->search) {
            $products = $products->filter(function($product) {
                return stripos($product->name, $this->search) !== false || stripos($product->description, $this->search) !== false;
            });
        }

        if ($this->categoryId) {
            $products = $products->where('category_id', $this->categoryId);
        }

        $products = $products->sortByDesc('created_at')->values();

        // Paginación con Livewire
        $perPage = 12;
        $currentPage = $this->getPage();
        $total = $products->count();
        $currentItems = $products->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedProducts = new LengthAwarePaginator(
            $currentItems,
            $total,
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $catalogo->products = $paginatedProducts;

        if ($catalogo->plantilla->id == 1) {
            return view('livewire.catalogo', compact('catalogo'))
                ->extends('layouts.catalogo1');
        } else {
            return view('livewire.catalogo2', compact('catalogo'))
                ->extends('layouts.catalogo1');
        }
    }

    public function filterByCategory($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->resetPage();
    }
    public function clearCategoryFilter()
    {
        $this->categoryId = null;
        $this->resetPage();
    }
}


