<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-semibold']) }}>
    {{ $slot }}
</button>
