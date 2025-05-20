<div class="space-y-10 mt-10">
    <!-- Slider 1 -->
    <div x-data="carousel()" class="relative">
        <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-200">
            Recomendations for {{ session('user_data')['preferred_genres'][0] }}
        </h3>

        <!-- Botón izquierdo -->
        <button @click="scrollLeft"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ‹
        </button>

        <div x-ref="container" class="flex gap-4 overflow-x-auto scroll-smooth py-2 no-scrollbar">
            @foreach (array_merge($movies1, $movies1) as $movie)
                <!-- card code... -->
                <div
                    class="flex-shrink-0 w-48 bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden h-[360px]">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        class="w-full h-40 object-cover" alt="{{ $movie['title'] }}" />
                    <div class="p-3 flex flex-col justify-between h-full">
                        <div class="space-y-1">
                            <a href="{{ route('movie.details', ['id' => $movie['id'] ?? $movie['movie_id']]) }}"
                                class="text-base font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                                {{ $movie['title'] }}
                            </a>
                            <span class="text-slate-500 text-sm font-semibold">
                                {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                            </span>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                {{ $movie['overview'] }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                <span>IMDB</span> <span class="text-xl">{{ $movie['vote_average'] }}</span>
                            </div>
                            <span class="text-slate-400 text-xl font-bold">#8</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón derecho -->
        <button @click="scrollRight"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ›
        </button>
    </div>

    <!-- Slider 2 -->
    <div x-data="carousel()" class="relative">
        <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-200">
            Recomendations for {{ session('user_data')['preferred_genres'][1] }}
        </h3>

        <button @click="scrollLeft"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ‹
        </button>

        <div x-ref="container" class="flex gap-4 overflow-x-auto scroll-smooth py-2 no-scrollbar">
            @foreach (array_merge($movies2, $movies2) as $movie)
                <!-- card code... -->
                <div
                    class="flex-shrink-0 w-48 bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden h-[360px]">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        class="w-full h-40 object-cover" alt="{{ $movie['title'] }}" />
                    <div class="p-3 flex flex-col justify-between h-full">
                        <div class="space-y-1">
                            <a href="{{ route('movie.details', ['id' => $movie['id'] ?? $movie['movie_id']]) }}"
                                class="text-base font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                                {{ $movie['title'] }}
                            </a>
                            <span class="text-slate-500 text-sm font-semibold">
                                {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                            </span>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                {{ $movie['overview'] }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                <span>IMDB</span> <span class="text-xl">{{ $movie['vote_average'] }}</span>
                            </div>
                            <span class="text-slate-400 text-xl font-bold">#8</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button @click="scrollRight"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ›
        </button>
    </div>

    <!-- Slider 3 -->
    <div x-data="carousel()" class="relative">
        <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-200">
            Recomendations for {{ session('user_data')['preferred_genres'][2] }}
        </h3>

        <button @click="scrollLeft"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ‹
        </button>

        <div x-ref="container" class="flex gap-4 overflow-x-auto scroll-smooth py-2 no-scrollbar">
            @foreach (array_merge($movies3, $movies3) as $movie)
                <!-- card code... -->
                <div
                    class="flex-shrink-0 w-48 bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden h-[360px]">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        class="w-full h-40 object-cover" alt="{{ $movie['title'] }}" />
                    <div class="p-3 flex flex-col justify-between h-full">
                        <div class="space-y-1">
                            <a href="{{ route('movie.details', ['id' => $movie['id'] ?? $movie['movie_id']]) }}"
                                class="text-base font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                                {{ $movie['title'] }}
                            </a>
                            <span class="text-slate-500 text-sm font-semibold">
                                {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                            </span>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                {{ $movie['overview'] }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                <span>IMDB</span> <span class="text-xl">{{ $movie['vote_average'] }}</span>
                            </div>
                            <span class="text-slate-400 text-xl font-bold">#8</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button @click="scrollRight"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ›
        </button>
    </div>

    <div x-data="carousel()" class="relative">
        <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-gray-200">
            Out of your comfort zone
        </h3>

        <button @click="scrollLeft"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ‹
        </button>

        <div x-ref="container" class="flex gap-4 overflow-x-auto scroll-smooth py-2 no-scrollbar">
            @foreach ($data as $movie)
                <!-- card code... -->
                <div
                    class="flex-shrink-0 w-48 bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden h-[360px]">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        class="w-full h-40 object-cover" alt="{{ $movie['title'] }}" />
                    <div class="p-3 flex flex-col justify-between h-full">
                        <div class="space-y-1">
                            <a href="{{ route('movie.details', ['id' => $movie['id'] ?? $movie['movie_id']]) }}"
                                class="text-base font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                                {{ $movie['title'] }}
                            </a>
                            <span class="text-slate-500 text-sm font-semibold">
                                {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                            </span>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                {{ $movie['overview'] }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                <span>IMDB</span> <span class="text-xl">{{ $movie['vote_average'] }}</span>
                            </div>
                            <span class="text-slate-400 text-xl font-bold">#8</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button @click="scrollRight"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-red-500 text-white rounded-full w-10 h-10 flex items-center justify-center z-10">
            ›
        </button>
    </div>
</div>
