<div class="max-w-3xl mx-auto p-4">
    @if(isset($product) && $product)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="sm:flex">
                @if(!empty($product->fotos->first()->url))
                    <div class="sm:w-1/3">
                        <img src="{{ asset('storage/' . $product->fotos->first()->url) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    </div>
                @endif
                <div class="p-4 flex-1">
                    <h1 class="text-2xl font-semibold">{{ $product->name }} / {{ $name }}</h1>
                    <p class="text-gray-600 mt-2">{{ $product->short_description ?? $product->description }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xl font-bold">{{ isset($product->price) ? number_format($product->price, 2) . ' €' : '—' }}</span>
                        <div class="space-x-2">
                            <button wire:click="addToCart({{ $product->id }})" class="px-3 py-1 bg-blue-600 text-white rounded">Añadir al carrito</button>
                            <button wire:click="$emit('showEditForm', {{ $product->id }})" class="px-3 py-1 bg-gray-200 rounded">Editar</button>
                        </div>
                    </div>
                    @if(!empty($product->stock))
                        <p class="mt-2 text-sm text-gray-500">Stock: {{ $product->stock }}</p>
                    @endif
                </div>
            </div>
            @if(!empty($product->description) && empty($product->short_description))
                <div class="p-4 border-t text-gray-700">
                    {!! nl2br(e($product->description)) !!}
                </div>
            @endif
        </div>
    @else
        <p class="text-center text-gray-500">Producto no disponible.</p>
    @endif
</div>