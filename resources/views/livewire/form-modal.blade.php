<div>
    @if ($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-2xl p-4">
                {{-- Contenido del modal --}}
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $type === 'edit' ? 'Editar' : 'Agregar' }}
                        {{ $tableType === 'Productos' ? 'Producto' : 'Categoria' }}
                    </h3>
                    <button wire:click="closeModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                
                {{-- Lógica para renderizar el formulario correcto --}}
                @if ($tableType === 'Productos')
                    @livewire('product-form', ['product' => $ItemId ? Product::find($ItemId) : null])
                @endif
                @if ($tableType === 'Categorías')
                    @livewire('category-form', ['category' => $ItemId ? Category::find($ItemId) : null])
                @endif
            </div>
        </div>
    @endif
</div>