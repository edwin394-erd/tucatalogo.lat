<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tucatalogo.lat</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      body {
        font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
      }
      nav {
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04);
      }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-200 to-white min-h-screen">
    @vite('resources/js/app.js')

<nav class="backdrop-blur-sm bg-white/70 dark:bg-gray-900/60 border-b border-gray-100 dark:border-gray-800 rounded-b-xl shadow-lg">
  <div class="max-w-screen-xl mx-auto px-4 md:px-6">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
          <x-logo />
        </a>
      </div>

     

      <div class="flex items-center gap-3">
        <!-- Search (decorative, no JS) -->
        <div class="hidden sm:flex items-center bg-white/60 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 rounded-full px-3 py-1 shadow-sm hover:shadow-md transition">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
          <input aria-label="Search" type="search" placeholder="Buscar..." class="bg-transparent text-sm text-gray-700 dark:text-gray-200 placeholder-gray-400 focus:outline-none ml-2 w-28 focus:w-40 transition-width duration-300" />
        </div>

        <!-- Theme toggle (visual only) -->
        <button aria-label="Toggle theme" class="hidden sm:inline-flex items-center justify-center w-9 h-9 rounded-full bg-white/60 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 hover:scale-105 transition">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
        </button>

        <!-- CTA visible on md+ (keeps auth links for guests) -->
        <div class="hidden md:flex items-center gap-2">
          <a href="{{ route('login') }}" wire:navigate class="px-3 py-1.5 text-sm rounded-md text-gray-700 hover:bg-gray-100 transition">Entrar</a>
          <a href="{{ route('register') }}" wire:navigate class="px-3 py-1.5 text-sm rounded-md bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow hover:from-blue-600 hover:to-purple-700 transition">Crear cuenta</a>
        </div>

        <!-- Mobile menu button -->
        <button data-collapse-toggle="navbar-default" type="button" aria-controls="navbar-default" aria-expanded="false"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg md:hidden hover:bg-gray-200 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile collapsible -->
    <div class="hidden w-full md:hidden mt-3" id="navbar-default">
      <div class="bg-white dark:bg-gray-900/70 border border-gray-100 dark:border-gray-800 rounded-xl p-3 shadow-sm">
        <ul class="flex flex-col gap-2">
          <li><a href="{{ route('home') }}" wire:navigate class="block px-3 py-2 rounded-md text-blue-700 bg-blue-50">Home</a></li>
          <li><a href="{{ route('login') }}" wire:navigate class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Login</a></li>
          <li><a href="{{ route('register') }}" wire:navigate class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Register</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
 <script>
    // Elimina el listener anterior si existe
    window.removeEventListener('livewire:navigated', window._myNavigatedListener);

    // Define el listener y guárdalo en window para referencia
    window._myNavigatedListener = function() {
        console.log('Livewire navigated hOLA');
        if (typeof initFlowbite === 'function') {
            initFlowbite();
        }
    };

    window.addEventListener('livewire:navigated', window._myNavigatedListener);
</script>
</body>
</html>