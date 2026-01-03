
  <div>
        <h2 class="text-2xl font-bold text-gray-700 mb-4">{{ $ItemId ? 'Editar Producto' : 'Crear Producto' }}</h2>
        <hr class="border-gray-400 my-4">
       @if($categories->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                <p class="font-bold">¡Atención!</p>
                <p>Para crear un producto, primero debes crear una categoría. <a href="{{ route('create', ['model' => 'Category']) }}" class="text-blue-600 underline">Crear Categoría</a></p>
            </div>
        @endif
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2 sm:col-span-1">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 gg:text-white">Nombre Producto</label>
                <input type="text" wire:model="name" name="name" id="name" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 gg:bg-gray-600 gg:border-gray-500 gg:placeholder-gray-400 gg:text-white gg:focus:ring-gray-500 gg:focus:border-gray-500" placeholder="Nombre del Producto">
                <x-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 gg:text-white">Precio</label>
                <input type="number" wire:model="price" name="price" id="price" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 gg:bg-gray-600 gg:border-gray-500 gg:placeholder-gray-400 gg:text-white gg:focus:ring-gray-500 gg:focus:border-gray-500" placeholder="$2999">
                <x-input-error for="price" class="mt-2" />
            </div>
            
            <div class="col-span-2 sm:col-span-1">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 gg:text-white">Categoría</label>
                <select name="category" id="category" wire:model="category" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 gg:bg-gray-600 gg:border-gray-500 gg:placeholder-gray-400 gg:text-white gg:focus:ring-gray-500 gg:focus:border-gray-500">
                    <option value="">Seleccionar categoría</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="category" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="descuento" class="block mb-2 text-sm font-medium text-gray-900 gg:text-white">Descuento</label>
                <select name="descuento" id="descuento" wire:model="descuento" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 gg:bg-gray-600 gg:border-gray-500 gg:placeholder-gray-400 gg:text-white gg:focus:ring-gray-500 gg:focus:border-gray-500">
                    <option value="">Sin descuento</option>
                    @foreach($descuentos as $desc)
                        <option value="{{ $desc->id }}">{{ $desc->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="descuento" class="mt-2" />
            </div>
            
            <div class="col-span-1">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 gg:text-white">Descripción del Producto</label>
                <textarea id="description" rows="4" wire:model="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 inset-shadow-sm rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 gg:bg-gray-600 gg:border-gray-500 gg:placeholder-gray-400 gg:text-white gg:focus:ring-gray-500 gg:focus:border-gray-500" placeholder="Escribe la descripción del producto aquí"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="flex flex-col">
                 <div class="col-span-1 sm:col-span-1">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 gg:text-white">Stock/Disponibilidad</label>
                <select id="stock" wire:model="stock" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 gg:bg-gray-600 gg:border-gray-500 gg:placeholder-gray-400 gg:text-white gg:focus:ring-gray-500 gg:focus:border-gray-500">
                    <option value="">Seleccionar opción</option>
                    <option value="Alto">Alta</option>
                    <option value="Medio">Media</option>
                    <option value="Bajo">Baja</option>
                    <option value="Agotado">Agotado</option>
                </select>
                <x-input-error for="stock" class="mt-2" />
            </div>

            <div class="col-span-1 sm:col-span-1 flex items-center mt-6">
                <input type="checkbox" id="visible" wire:model="visible"  class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 rounded focus:ring-gray-500 focus:ring-2" checked="true">
                <label for="visible" class="ml-2 text-sm font-medium text-gray-900 gg:text-white" checked>Visible</label>
                <x-input-error for="visible" class="ml-4" />
            </div>

            </div>

           
        </div>

        <div class="flex flex-wrap items-center justify-center w-full mb-2">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 inset-shadow-sm gg:hover:bg-gray-800 gg:bg-gray-700 hover:bg-gray-100 gg:border-gray-600 gg:hover:border-gray-500 gg:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center p-6">
                    @if(count($existingImages) > 0 || count($images) > 0)
                        <div class="flex flex-wrap items-center justify-center gap-4 mb-2">
                            {{-- Imágenes ya guardadas --}}
                            @foreach($existingImages as $foto)
                                <div class="relative w-24 h-24">
                                    <img src="{{ asset('storage/' . $foto['url']) }}" alt="Foto guardada" class="w-full h-full object-cover rounded" />
                                    <button type="button" wire:click="markImageForDeletion({{ $foto['id'] }})" class="absolute top-0 right-0 p-1 text-white bg-red-500 rounded-full hover:bg-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                            
                            {{-- Imágenes nuevas (no guardadas aún) --}}
                            @foreach(array_keys($images) as $index)
                                <div class="relative w-24 h-24">
                                    <img src="{{ $images[$index]->temporaryUrl() }}" alt="Foto temporal" class="w-full h-full object-cover rounded" />
                                    <button type="button" wire:click="removeNewImage({{ $index }})" class="absolute top-0 right-0 p-1 text-white bg-red-500 rounded-full hover:bg-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <svg class="w-8 h-8 mb-4 text-gray-500 gg:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.207M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.207M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.207m7.728 2.373A1.5 1.5 0 0 1 12 14v1a1 1 0 0 1-2 0v-1a1.5 1.5 0 0 1 1.054-1.428L11 12.5v-1.5z"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 gg:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 gg:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    @endif
                </div>
                <input id="dropzone-file" type="file" class="hidden" wire:model="images" multiple />
            </label>
        </div>

        <x-input-error for="images" class="mt-2" />
        <x-input-error for="images.*" class="mt-2" />
        <br>
      

        <div class="flex justify-end">
           <button
                wire:click="save"
                class="text-white inline-flex items-center bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center gg:bg-gray-600 gg:hover:bg-gray-700 gg:focus:ring-gray-800"
                wire:loading.attr="disabled"
                wire:target="images"
                @disabled($errors->has('images') || $errors->has('images.*'))
            >
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                <span wire:loading wire:target="save" class="hidden">Guardando...</span>
                <span wire:loading.remove wire:target="save">Guardar Producto</span>
            </button>
        </div>
</div>

    
