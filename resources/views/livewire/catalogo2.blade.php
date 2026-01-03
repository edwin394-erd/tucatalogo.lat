<div class="flex flex-col lg:flex-row min-h-screen bg-gray-200">
    {{-- Sidebar --}}
<aside class="w-full lg:w-64 bg-white shadow-lg flex flex-col py-8 px-6 lg:static z-40 transition-all duration-300">
        <div class="flex flex-col items-center mb-10">
            @if ($catalogo->logo_url != null)
            <img src="{{ asset('storage/' . $catalogo->logo_url) }}" alt="Logo" class="w-20 h-20 md:w-24 md:h-24 rounded-full border-4 border-gray-200 shadow mb-4 object-cover bg-white">
            @else
            <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 border-4 border-gray-200 shadow mb-4">Sin logo</div>
            @endif
            <h2 class="text-lg md:text-xl font-bold text-gray-800 text-center">{{ $catalogo->name }}</h2>
            <p class="text-xs md:text-sm text-gray-500 text-center">{{ $catalogo->description }}</p>
        </div>
        <nav class="flex-1">
            <ul class="space-y-2">

                <li>
                    <a href="#categorias"  class="block py-2 px-1 rounded hover:bg-gray-100 text-gray-700 font-medium">Categorías</a>
                </li>
                <li>
                    <a href="#categorias" wire:click="filterByCategory(null)" class="block py-2 px-4 rounded hover:bg-gray-100 text-gray-700 font-medium">Todas</a>
                </li>

                @foreach ($catalogo->categories as $categoria)
                    <li>
                        <a href="#categoria-{{ $categoria->id }}"  wire:click="filterByCategory({{ $categoria->id }})" class="block py-2 px-4 rounded hover:bg-gray-100 text-gray-700 font-medium">{{ $categoria->name }}</a>
                    </li>
                @endforeach

                {{-- <li>
                    <a href="#productos" class="block py-2 px-4 rounded hover:bg-gray-100 text-gray-700 font-medium">Productos</a>
                </li> --}}
                @if (auth()->check() && auth()->user()->catalogo->name == $catalogo->name)
                <br>
                    <li>
                        <a wire:navigate href="{{ route('configuracion')}}" class="flex items-center gap-2 py-2 px-1 rounded hover:bg-gray-100 text-gray-700 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Configuración
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>

                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="pt-4 pb-8 px-4 lg:px-8 flex-1">
        {{-- Header --}}
        
        {{-- Categorías --}}
        {{-- <div id="categorias" class="max-w-7xl mx-auto mb-10 mt-8">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-700 mb-6">Categorías</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6">
                @forelse ($catalogo->categories as $category)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300 p-2 flex flex-col items-center">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 text-center">{{ $category->name }}</h3>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-400 py-10">
                        No hay categorías en este catálogo.
                    </div>
                @endforelse
            </div>
        </div> --}}

        {{-- Productos --}}
        <div id="productos" class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-6">

                <h2 class="text-xl sm:text-2xl font-bold text-gray-700 mb-6">Productos</h2>

                <input type="text" wire:model.live="search" placeholder="Buscar productos..." class="bg-gray-100 inset-shadow-sm w-full sm:w-1/3 p-3 rounded-2xl border border-gray-300 focus:ring-gray-500 focus:border-gray-500 text-gray-900" />
            </div>
             {{ $catalogo->products->links() }}
             <br>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-8">
                @forelse ($catalogo->products as $item)
                    <div class="bg-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                    <a href="#" class="block">
                        <img class="rounded-t-2xl w-full h-48 object-cover" src="{{ asset('storage/' . $item->fotos[0]->url) }}" alt="{{ $item->name }}" />
                    </a>
                    <div class="p-5 flex flex-col flex-1">
                        <a href="#">
                            <h5 class="text-lg font-semibold text-gray-900 mb-2 truncate">{{ $item->name }}</h5>
                        </a>
                        <div class="flex items-center mb-3">
                            {{-- Stars --}}
                            {{-- <div class="flex items-center space-x-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < 4 ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">5.0</span> --}}
                        </div>

                        <div>
                            <p class="text-gray-600 text-sm mb-4 flex-1">{{ Str::limit($item->description, 100) }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-2xl font-bold text-gray-900">${{ $item->price }}</span>
<div class="flex">

    @php
$mensaje = "Hola! Me interesa el producto: " . $item->name . "\nPrecio: $" . $item->price . "\n¿Podrías darme más información al respecto?" . "\nLink del producto: " . route('product-show', ['name' => $catalogo->name, 'id' => $item->id]);
@endphp
       
        <a href="https://wa.me/{{$catalogo->telefono_contacto}}?text={{ urlencode($mensaje) }}" target="_blank" class="ml-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center transition-colors duration-200">
        <svg fill="#fff" width="22px" height="22px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>whatsapp</title> <path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"></path> </g></svg>
        </a>
    <a href="#" class="ml-2 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
    </svg>
    </a>
</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-400 py-10">
                    No hay resultados.
                </div>
                @endforelse
            </div>
        </div>
    </div>
   
</div>
