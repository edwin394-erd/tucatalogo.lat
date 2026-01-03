<div class="flex flex-col md:items-center">
    @php
        if ($model == 'Descuento') {
            $route_name = 'descuentos';
        }elseif ($model == 'Category') {
            $route_name = 'categories';
        } elseif ($model == 'Product') {
            $route_name = 'products';
        }
    @endphp
    {{-- <a href="{{ route($route_name) }}" wire:navigate class="text-blue-500 hover:underline inline-block">
        &larr; Volver
    </a> --}}

<div class="p-4 md:p-5 bg-white md:m-5  rounded-lg md:w-1/2" >

    @if($model == 'Product')

        @livewire('product-form')
    @elseif($model == 'Category')
        @livewire('category-form')
    @elseif($model == 'Descuento')
 
        @livewire('descuento-form')
    @endif
</div>
    
</div>
