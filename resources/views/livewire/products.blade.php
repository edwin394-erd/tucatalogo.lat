<div class="px-5 my-5">
    {{-- <h1 class="text-2xl font-bold text-gray-700 ">Tus Productos</h1> <br>--}}
    
    <div class="p-0">

        @livewire('table', [
            'model' => 'Product',
            'columns' => ['foto','name', 'description', 'category_id','price', 'descuento_id', 'stock'],
            'column_names' => ['Foto', 'Nombre', 'Descripción', 'Categoria', 'Precio', 'Descuento', 'Stock'],
            'filter_field' => 'catalogo_id',
            'filter_value' => auth()->user()->catalogo->id,
            'table_type' => 'Productos',
        ])


       {{-- <x-table 
            :model="'Product'" 
            :columns="['foto','name', 'description', 'category_id','price', 'descuento_id', 'stock']" 
            :column_names="['Foto', 'Nombre', 'Descripción', 'Categoria', 'Precio', 'Descuento', 'Stock']" 
            :filter_field="'catalogo_id'" 
            :filter_value="auth()->user()->catalogo->id" 
            :table_type="'Productos'"
            :route_name="'products'"
        /> --}}
    </div>

</div>