<div class="space-y-10">
    <!-- Slider 1 -->
    <div x-data="carousel()" class="relative">
        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">
            Welcome to the serendipity page, here you will find new recommendations that may take you out of your comfort zone!
        </h3>

        <!-- Left Button -->
        <button @click="scrollLeft"
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-red-500 hover:bg-red-600 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg z-10 focus:outline-none focus:ring-2 focus:ring-red-400">
            ‹
        </button>

        <div x-ref="container" class="flex gap-6 overflow-x-auto scroll-smooth py-4 px-12 no-scrollbar">
            @foreach ($data as $movie)
                <!-- card code... -->
                <div
                    class="flex-shrink-0 w-52 bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden h-[370px] transition-transform hover:scale-105">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        class="w-full h-44 object-cover" alt="{{ $movie['title'] }}" />
                    <div class="p-4 flex flex-col justify-between h-[calc(100%-11rem)]">
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
                        <div class="flex justify-between items-center pt-3">
                            <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                <span>IMDB</span> <span class="text-xl">{{ $movie['vote_average'] }}</span>
                            </div>
                            <span class="text-slate-400 text-xl font-bold">#8</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Right Button -->
        <button @click="scrollRight"
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-red-500 hover:bg-red-600 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg z-10 focus:outline-none focus:ring-2 focus:ring-red-400">
            ›
        </button>
    </div>
</div>
