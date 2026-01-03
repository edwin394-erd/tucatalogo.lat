<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Descuento;
use App\Models\Product;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;

class ProductForm extends Component
{
    use WithFileUploads;

    public $ItemId;
    public $name;
    public $price;
    public $category;
    public $descuento;
    public $stock;
    public $description;
    public $images = []; // Nuevas imágenes temporales
    public $existingImages = []; // Imágenes guardadas en la base de datos
    public $imagesToDelete = []; // IDs de imágenes que se marcaron para eliminar
    public $visible;

    public $categories = [];
    public $descuentos = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category' => 'required|exists:categories,id',
        'descuento' => 'nullable|exists:descuentos,id',
        'stock' => 'required|string',
        'visible' => 'required|boolean',
        'description' => 'nullable|string',
        'images' => 'array',
        'images.*' => 'mimes:jpeg,png,jpg,gif|max:2048',
    ];

    protected $messages = [
        'name.required' => 'El nombre del producto es obligatorio.',
        'price.required' => 'El precio es obligatorio.',
        'price.numeric' => 'El precio debe ser un número válido.',
        'category.required' => 'La categoría es obligatoria.',
        'category.exists' => 'La categoría seleccionada no es válida.',
        'descuento.exists' => 'El descuento seleccionado no es válido.',
        'stock.required' => 'El stock es obligatorio.',
        'images.*.mimes' => 'Las imágenes deben ser de tipo: jpeg, png, jpg, gif.',
        'images.*.max' => 'Las imágenes no deben pesar más de 2MB.',
    ];
    
    public function mount($ItemId = null)
    {
        $user = auth()->user();
        $this->categories = Category::where('catalogo_id', $user->catalogo->id)->get();
        $this->descuentos = Descuento::where('catalogo_id', $user->catalogo->id)->get();
        $this->ItemId = $ItemId;

        if($this->visible === null && !$this->ItemId){ 
            $this->visible = true; // Valor predeterminado
        }

    

        if ($this->ItemId) {
            
            $product = Product::with('fotos')->find($this->ItemId);
            
            if ($product) {
                $this->name = $product->name;
                $this->price = $product->price;
                $this->category = $product->category_id;
                $this->descuento = $product->descuento_id;
                $this->stock = $product->stock;
                $this->visible = (bool)$product->visible;
                $this->description = $product->description;
                $this->existingImages = $product->fotos->toArray();
            }
        }
    }
    
    public function render()
    {
        return view('livewire.product-form');
    }

    // Marca una imagen existente para ser eliminada cuando se guarde el formulario.
    public function markImageForDeletion($imageId)
    {
        $this->imagesToDelete[] = $imageId;
        $this->existingImages = collect($this->existingImages)->filter(function ($item) use ($imageId) {
            return $item['id'] != $imageId;
        })->values()->toArray();
    }
    
    // Elimina una imagen nueva (temporal) antes de que se guarde.
    public function removeNewImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }
 
    
    public function save()
    {
        $this->validate();

        // Validación personalizada para asegurar al menos una imagen.
        if (count($this->images) + count($this->existingImages) === 0) {
             $this->addError('images', 'El producto debe tener al menos una imagen.');
             return;
        }

        if ($this->ItemId) {
            $product = Product::find($this->ItemId);
            if ($product) {


                $product->update([
                    'name' => $this->name,
                    'price' => $this->price,
                    'category_id' => $this->category,
                    'descuento_id' => $this->descuento,
                    'stock' => $this->stock,
                    'visible' => (int) $this->visible,
                    'description' => $this->description,
                ]);

                // Procesa las imágenes marcadas para eliminación.
                foreach ($this->imagesToDelete as $imageId) {
                    $image = Foto::find($imageId);
                    if ($image) {
                        Storage::disk('public')->delete($image->url);
                        $image->delete();
                    }
                }
                
                // Sube y asocia las nuevas imágenes.
                foreach ($this->images as $image) {
                    $path = $image->store('products', 'public');
                    $product->fotos()->create([
                        'url' => $path,
                        'imageable_type' => Product::class,
                    ]);
                }

                session()->flash('message', 'Producto actualizado con éxito.');
            }
        } else {
            // Lógica para crear un nuevo producto.
            $product = Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'category_id' => $this->category,
                'descuento_id' => $this->descuento,
                'stock' => $this->stock,
                'visible' => (int) $this->visible,
                'description' => $this->description,
                'catalogo_id' => auth()->user()->catalogo->id,
            ]);

            // Sube y asocia las imágenes del nuevo producto.
            foreach ($this->images as $image) {
                $path = $image->store('products', 'public');
                $product->fotos()->create([
                    'url' => $path,
                    'imageable_id' => $product->id,
                    'imageable_type' => Product::class,
                ]);
            }

            session()->flash('message', 'Producto creado con éxito.');
            $this->reset(['name', 'price', 'category', 'descuento', 'stock', 'description', 'images', 'visible', 'existingImages']);
        }

        

        $this->redirectRoute('products');
    }
}