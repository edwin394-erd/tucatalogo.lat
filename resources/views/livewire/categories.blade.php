<div class="px-5 my-5">
    {{-- <h1 class="text-2xl font-bold text-gray-700">Tus Categorías</h1><br> --}}
    

    <div class="p-0">
        
        @livewire('table', [
            'model' => 'Category',
            'columns' => ['name', 'description'],
            'column_names' => ['Nombre', 'Descripción'],
            'filter_field' => 'catalogo_id',
            'filter_value' => auth()->user()->catalogo->id,
            'table_type' => 'Categorías'

        ])
    </div>

</div>