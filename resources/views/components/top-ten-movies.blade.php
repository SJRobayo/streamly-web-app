<h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Recommendations for you</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
    @foreach ($topTenMovies as $movie)
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden flex flex-col h-[440px]">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="w-full h-52 object-cover"
                alt="{{ $movie['title'] }}" />

            <div class="p-4 flex flex-col justify-between flex-grow">
                <div class="space-y-1">
                    <a href="{{ route('movie.details', ['id' => $movie['id'] ?? $movie['movie_id']]) }}"
                        class="text-lg font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                        {{ $movie['title'] }}
                    </a>
                    <span class="text-slate-500 text-sm font-semibold">
                        {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                    </span>
                    <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3 overflow-hidden">
                        {{ $movie['overview'] }}
                    </p>
                </div>

                <div class="flex justify-between items-center pt-2">
                    <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                        <span>IMDB</span> <span class="text-2xl">{{ $movie['vote_average'] }}</span>
                    </div>
                    <span class="text-slate-400 text-xl font-bold">#8</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
