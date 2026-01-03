@props(['options', 'placeholder', 'wireModel'])

<div
    x-data="{
        open: false,
        filter: '',
        selectedItem: @entangle($wireModel),
        items: @js($options),
        get filteredItems() {
            return this.items.filter(item => item.toLowerCase().includes(this.filter.toLowerCase()));
        }
    }"
    x-init="$watch('selectedItem', value => filter = '');"
    x-on:click.away="open = false"
    class="relative w-full"
>
    <div
        x-on:click="open = !open; $nextTick(() => { if (open) $el.querySelector('input').focus(); });"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 cursor-pointer"
        role="button"
    >
        <span x-text="selectedItem || '{{ $placeholder }}'" class="text-gray-400"></span>
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto"
        style="display: none;"
    >
        <input
            type="text"
            x-model.debounce.250ms="filter"
            placeholder="Buscar..."
            class="sticky top-0 w-full p-2 border-b border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-primary-600 focus:border-primary-600 rounded-t-lg"
        >
        <ul class="py-1">
            <template x-if="filteredItems.length === 0">
                <li class="px-4 py-2 text-gray-500">No se encontraron resultados</li>
            </template>
            <template x-for="item in filteredItems" :key="item">
                <li
                    x-on:click="selectedItem = item; open = false;"
                    class="px-4 py-2 cursor-pointer hover:bg-gray-100 text-gray-900"
                    :class="{ 'bg-gray-200': item === selectedItem }"
                    x-text="item"
                ></li>
            </template>
        </ul>
    </div>
</div>