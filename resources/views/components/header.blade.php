<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-4">
    <!-- Título -->
    <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
        {{-- <span class="text-red-500 font-mono">{{ $title ?? __('Streamly') }}</span> --}}
    </h2>

    <!-- Buscador -->
    <div class="flex items-center w-full md:w-auto space-x-2">
        <input
            type="text"
            wire:model.live.debounce.500ms="query"
            placeholder="Search movies..."
            class="w-full md:w-64 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-gray-400 dark:placeholder-gray-500 transition duration-200"
        />
        {{-- <button
            type="button"
            wire:click="search"
            class="p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200"
            title="Search"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>
        </button> --}}
    </div>
</div>
