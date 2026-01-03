@props(['title', 'content'])
<div class="shadow bg-white shadow-xl rounded-lg p-0 w-1/3 h-1/3" {{ $attributes }}>
    <div class="px-4 py-2 bg-white rounded-t-lg shadow shadow-b-md">
        <h2 class="text-xl text-gray-700 font-semibold mb-2">{{ $title }}</h2>

    
    </div>

    <div class="inset-shadow-sm px-6">

        <h2 class="text-gray-600 text-xl dark:text-gray-400  pt-6 mb-3">{{ $content }}</h2>
        <div class="flex justify-end">
            <a href="#" class="text-gray-200 text-sm rounded-lg bg-indigo-600 mb-6 p-2">Ver más</a>
        </div>
    </div>
 

</div>